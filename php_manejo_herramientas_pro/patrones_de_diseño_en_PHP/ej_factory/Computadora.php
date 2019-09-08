<?php
class Computadora {
    public $ram;
    public $hard_drive;
    public $monitor;
    public function __construct($ram, $hard_drive, $monitor) {
        $this->ram = $ram;
        $this->hard_drive = $hard_drive;
        $this->monitor = $monitor;
    }
}    

class Ram {
    private $size; //GB
    public function __construct($ram_size){
        $this->size = $ram_size;
    }
}

class HardDrive {
    private $size; //GB
    public function __construct($hard_drive_size){
        $this->size = $hard_drive_size;
    }    
}

class Monitor {
    private $size; //Pulgadas
    public function __construct($monitor_size){
        $this->size = $monitor_size;
    }    
}

$mi_compu = new Computadora(new Ram(8), new HardDrive(500), new Monitor(15));

class FactoryComputadora {
    public static function create($ram_size,  $hard_drive_size, $monitor_size) {
        $ram = new Ram($ram_size);
        $hard_drive = new HardDrive($hard_drive_size);
        $monitor = new Monitor($monitor_size);

        return new Computadora($ram, $hard_drive, $monitor);
    }
}

$mi_nueva_compu = FactoryComputadora::create(16, 1024, 30);

var_dump($mi_compu);
var_dump($mi_nueva_compu);