<?php 

class ChildrenInfo {
    private string $gioiTinh;
    private string $theTrang;
    private float $thangTuoi;
    private float $canNang;
    private float $chieuCao;
    private float $BMI;
    private float $nhuCauNangLuong;

    public function __construct($gioiTinh, $thangTuoi, $canNang, $chieuCao)
    {
        $this->gioiTinh = $gioiTinh;
        $this->thangTuoi = $thangTuoi;
        $this->canNang = $canNang;
        $this->chieuCao = $chieuCao;
    }
    public function getGioiTinh(){
        return $this->gioiTinh;
    }

    public function getTheTrang() {
        return $this->theTrang;
    }
    public function getThangTuoi(){
        return $this->thangTuoi;
    }
    public function getCanNang(){
        return $this->canNang;
    }
    public function getChieuCao(){
        return $this->chieuCao;
    }

    public function getBMI() {
        return $this->BMI;
    }

    public function getNhuCauNangLuong() {
        return $this->nhuCauNangLuong;
    }

    public function setNhuCauNangLuong($val1) {
        $this->nhuCauNangLuong = $val1;
    }

    public function setBMI() {
        $this->BMI = round(($this->canNang) / (($this->chieuCao / 100) * ($this->chieuCao/100)));
    }

    public function setGioiTinh($val1){
        $this->gioiTinh = $val1;
    }
    public function setTheTrang($val1){
        $this->theTrang = $val1;
    }
    public function setThangTuoi($val1){
        $this->thangTuoi = $val1;
    }
    public function setCanNang($val1){
        $this->canNang = $val1;
    }
    public function setChieuCao($val1){
        $this->chieuCao = $val1;
    }

}