<?php
require_once __DIR__ . '/../models/student.php';

class StudentController {
    private $student;

    public function __construct($db) {
        $this->student = new Student($db);
    }

    public function index() {
        $data = $this->student->getAll();
        include __DIR__ . '/../views/student_list.php';
    }

    public function createForm() {
        include __DIR__ . '/../views/student_form.php';
    }

    public function store($post) {
        $this->student->nama = $post['nama'];
        $this->student->alamat = $post['alamat'];
        $this->student->jenis_kelamin = $post['jenis_kelamin'];
        $this->student->create();
        header("Location: index.php");
    }

    public function editForm($id) {
        $studentData = $this->student->getById($id);
        include __DIR__ . '/../views/student_form.php';
    }

    public function update($post) {
        $this->student->id = $post['id'];
        $this->student->nama = $post['nama'];
        $this->student->alamat = $post['alamat'];
        $this->student->jenis_kelamin = $post['jenis_kelamin'];
        $this->student->update();
        header("Location: index.php");
    }

    public function delete($id) {
        $this->student->delete($id);
        header("Location: index.php");
    }
}
