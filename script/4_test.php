<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    // URL/(root)
    public function index()
    {
        $this->output->set_output('Hello Go developers');
    }

    // URL/language
    public function language()
    {
        // Data hardcoded dari soal no 2
        $data = array(
            "language" => "C",
            "appeared" => 1972,
            "created" => array("Dennis Ritchie"),
            "functional" => true,
            "object-oriented" => false,
            "relation" => array(
                "influenced-by" => array("B", "ALGOL 68", "Assembly", "FORTRAN"),
                "influences" => array("C++", "Objective-C", "C#", "Java", "JavaScript", "PHP", "Go")
            )
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    // URL/not_allowed 
    public function not_allowed()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'GET' && $this->input->server('REQUEST_METHOD') !== 'POST') {
            $this->output->set_status_header(405);
            $this->output->set_output('Method not allowed');
        }
    }

    // URL/palindrome 
    public function palindrome()
    {
        $text = $this->input->get('text');

        // Menghapus spasi dan mengubah menjadi huruf kecil
        $text = strtolower(str_replace(' ', '', $text));

        // Mengecek apakah teks adalah palindrom
        if ($text === strrev($text)) {
            $this->output->set_status_header(200);
            $this->output->set_output('Palindrome');
        } else {
            $this->output->set_status_header(400);
            $this->output->set_output('Not palindrome');
        }
    }