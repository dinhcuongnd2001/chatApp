<?php
class ClassObject {
    private  $id;
    private string $gioiTinh;
    private float $BMI_SSD1;
    private float $BMI_SSD2;
    private float $BMI_SSD3;
    private float $BMI_TB;
    private float $BMI_BP1;
    private float $BMI_BP2;
    private float $BMI_BP3;

    public function __construct($object) {
        $this->id = $object['id'] ?? '';
        $this->gioiTinh = $object['gioiTinh'];
        $this->BMI_SSD1 = $object['BMI_SDD1'];
        $this->BMI_SSD2 = $object['BMI_SDD2'];
        $this->BMI_SSD3 = $object['BMI_SDD3'];
        $this->BMI_TB = $object['BMI_TB'];
        $this->BMI_BP1 = $object['BMI_BP1'];
        $this->BMI_BP2 = $object['BMI_BP2'];
        $this->BMI_BP3 = $object['BMI_BP3'];
    }

    public function getGioiTinh(){
        return $this->gioiTinh;
    }
    public function setGioiTinh($gioiTinh){
        $this->gioiTinh = $gioiTinh;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getBMI_SDD3(){
        return $this->BMI_SSD3;
    }
    public function getBMI_SDD1(){
        return $this->BMI_SSD1;
    }
    public function getBMI_SDD2(){
        return $this->BMI_SSD2;
    }
    public function getBMI_TB(){
        return $this->BMI_TB;
    }
    public function getBMI_BP1(){
        return $this->BMI_BP1;
    }
    public function getBMI_BP2(){
        return $this->BMI_BP2;
    }
    public function getBMI_BP3(){
        return $this->BMI_BP3;
    }
}