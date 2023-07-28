<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    // Variabel global untuk menyimpan data language  
    private $languages = array();

    public function __construct()
    {
        parent::__construct();

        // Data language sebelumnya
        $this->languages = array(
            array(
                "language" => "C",
                "appeared" => 1972,
                "created" => array("Dennis Ritchie"),
                "functional" => true,
                "object-oriented" => false,
                "relation" => array(
                    "influenced-by" => array("B", "ALGOL 68", "Assembly", "FORTRAN"),
                    "influences" => array("C++", "Objective-C", "C#", "Java", "JavaScript", "PHP", "Go")
                )
            ),
            // Data language baru
            array(
                "language" => "Go",
                "appeared" => 2009,
                "created" => array("Robert Griesemer", "Rob Pike", "Ken Thompson"),
                "functional" => true,
                "object-oriented" => false,
                "relation" => array(
                    "influenced-by" => array("C", "Python", "Pascal", "Smalltalk", "Modula"),
                    "influences" => array("Odin", "Crystal", "Zig")
                )
            ),
            array(
                "language" => "Python",
                "appeared" => 1991,
                "created" => array("Guido van Rossum"),
                "functional" => true,
                "object-oriented" => true,
                "relation" => array(
                    "influenced-by" => array("C", "C++", "ALGOL 68", "Ada", "Haskell", "Java", "Lisp"),
                    "influences" => array("Go", "CoffeeScript", "JavaScript", "Julia", "Ruby", "Swift")
                )
            )
        );
    }

    public function index()
    {
        $this->output->set_output('Hello Go developers');
    }

    public function language($id = null)
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if ($id !== null) {
                    // Ambil data berdasarkan id
                    if (isset($this->languages[$id])) {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode($this->languages[$id]));
                    } else {
                        $this->output->set_status_header(404);
                        $this->output->set_output('Data not found');
                    }
                } else {
                    // Ambil semua data
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($this->languages));
                }
                break;
            case 'POST':
                // Ambil data JSON dari body dan tambahkan ke array $languages
                $data = json_decode($this->input->input_stream, true);
                $this->languages[] = $data;
                $this->output->set_status_header(201);
                $this->output->set_output('Data added successfully');
                break;
            case 'PATCH':
                // Ubah data language berdasarkan index
                if (isset($this->languages[$id])) {
                    $data = json_decode($this->input->input_stream, true);
                    $this->languages[$id] = $data;
                    $this->output->set_output('Data updated successfully');
                } else {
                    $this->output->set_status_header(404);
                    $this->output->set_output('Data not found');
                }
                break;
            case 'DELETE':
                // Hapus data language berdasarkan index
                if (isset($this->languages[$id])) {
                    unset($this->languages[$id]);
                    $this->output->set_output('Data deleted successfully');
                } else {
                    $this->output->set_status_header(404);
                    $this->output->set_output('Data not found');
                }
                break;
        }
    }
    // URL/not_allowed 
    public function not_allowed()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'GET' && $this->input->server('REQUEST_METHOD') !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_output('Method not allowed');
        }
    }
}
