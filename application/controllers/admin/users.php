<?php
/**
 * Description of users
 *
 * @author Krzysztof
 */
class Users extends CI_Controller {

    public function __construct() {
        // ładowanie constructora rodzica, żeby nasz controller był zgodny z zasadą działania frameworka
        parent::__construct();
        // ładowanie biblioteki walidacji dancych formularza (POST), zobacz bo chyba jest 
        // w config autoload.php, więc można usunąć z kodu controllerów
        $this->load->library('form_validation');
        // ładowanie modelu dla tabeli Grupy
        $this->load->model('groups_m');
        // ładowanie modelu dla tabeli Użytkownicy
        $this->load->model('users_m');
    }

    /**
     * Metoda a właściwie akcja odpalana dla kontrolera Users
     */
    public function index() {
        $this->lista();
    }
    
    /**
     * Akcja generująca listę użytkowników
     */
    public function lista() {
        // Pobieranie WSZYSTKICH użytkowników
        $lista = $this->users_m->get_all();
        // tablica $data zawiera dane przekazywane do widoku
        $data['list'] = $lista;
        //ładowanie widoku header (element head oraz nagłówek strony)
        $this->load->view('admin/header');
        //ładowanie widoku głównego wraz z przekazaną tablicą danych
        $this->load->view('admin/users/lista', $data);
        //ładowanie wodku stopki (znaczniki zamykające, skrypty js)
        $this->load->view('admin/footer');
    }

    /**
     * Akcja users/create przetwarza wysłane dane albo wyświetla formularz 
     * dodawania nowego użytkownika
     */
    public function create() {
        // walidacja danych
        $this->user_validation();
        //jeżeli są dane i przeszły walidację
        if ($this->form_validation->run()) {
            //tworzenie tablicy, której indeksy wskazują na kolumny w tabeli Users
            $data = array(
                // pobieranie wartości z tablicy $_POST
                'name' => $this->input->post('name'),
                'login' => $this->input->post('login'),
                'password' => $this->input->post('password'),
                'group_id' => $this->input->post('group_id'),
                'email' => $this->input->post('mail'),
            );
            // zapisanie danych nowego użytkownika do bazy
            $this->users_m->insert($data);
        }
        //pobranie grup użytkowników (do formularza rejestracji)
        $view_data['groups'] = $this->groups_m->get_all();
        //ładowanie widoku formularza rejestracji
        $this->load->view('register', $view_data);
    }

    /**
     * Usuwanie użytkownika
     * @param int $user_id ID użytkownika
     */
    public function delete($user_id) {
        //sprawdzenie czy przekazana wartość jest numerem
        if (ctype_digit($user_id)) {
            //usunięcie encji użytkownika o id $user_id
            $delete = $this->users_m->delete($user_id);
            // można sprawdzić czy $delete jest wartością > 0 
        }
        //przekierowanie na stronę listy użytkowników (przydałaby się notka o usunięciu lub jego braku)
        redirect('admin/users/lista');
    }

    /*
     * Strona z formularzem edycji 
     */
    public function edit($user_id) {
        if (ctype_digit($user_id)) {
            // jeżeli użytkownik nie istnieje w bazie, to nie ma co edytować
            $qweert = $this->users_m->get($user_id);
            if ($qweert) {
                $data['user'] = $qweert;
                $data['groups'] = $this->groups_m->get_all();
                //formularz edycji użytkownika z danymi ($data['users'])
                $this->load->view('admin/users/edit', $data);
            } else {
                show_404();
            }
        } else {
            redirect('admin/users/lista');
        }
    }

    /**
     * Akcja po wysłaniu formularza edycji
     * @param strig $user_id ID użytkownika
     */
    public function edit_post($user_id) {
        $this->user_validation(true);
        if ($this->form_validation->run()) {
            $data = $this->readData();
            $this->users_m->update($user_id, $data);
            $this->session->set_flashdata('success', 'Użytkowink został popranie zmieniony.');
            redirect('admin/users/lista');
        } else {
            $this->edit($user_id);
        }
    }

    /**
     * Czy tego też używamy?
     */
    public function add() {
        $this->user_validation();
        if ($this->form_validation->run()) {
            $data = $this->readData();
            $this->users_m->insert($data);
            redirect('admin/users/lista');
        }
        $view_data['groups'] = $this->groups_m->get_all();
        $this->load->view('admin/users/register', $view_data);
    }

    /**
     * Tworzenie tablicy z danymi użytkownika
     * @return type\
     */
    private function readData() {
        return $data = array(
            'name' => $this->input->post('name'),
            'login' => $this->input->post('login'),
            'password' => $this->input->post('password'),
            'group_id' => $this->input->post('group_id'),
            'email' => $this->input->post('mail'),
        );
    }

    /**
     * Walidacja danych nowego użytkownika
     * @param bool $edit Jeżeli ma miejsce edycja, nie zawsze jest potrzebna
     * walidacja pola password
     */
    private function user_validation($edit = FALSE) {
        // walidacja pola name
        $this->form_validation->set_rules('name', 'Imię i nazwisko', 'required');
        // należy poprawić funcję is_uniq, żeby nie zwracała błędu gdy edytujemy użytkownika
        // i nie zmieniamy mu loginu albo podczas edycji uniemożliwić zmianę loginu
        $this->form_validation->set_rules('login', 'login', 'required|is_unique[users.login]');
        $this->form_validation->set_rules('group_id', 'group_id', 'required|integer');
        $this->form_validation->set_rules('mail', 'email', 'required|valid_email');
        
        // jeżeli wprowadzamy nowego użytkownika (!$edit) lub gdy pole password nie jest puste
        if(!$edit || ($this->input->post('password') && !empty($this->input->post('password'))))
        {
            $this->form_validation->set_rules('password', 'password', 'required|matches[password2]');
            $this->form_validation->set_rules('password2', 'password2', 'required');
        }
    }
    

}
