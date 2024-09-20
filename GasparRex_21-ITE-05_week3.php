<?php
// Base class: Vehicle
class Vehicle {
    // Properties common to all vehicles
    protected $make;
    protected $model;
    protected $year;

    // Constructor to initialize the vehicle
    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Method to display vehicle details (marked as final to prevent overriding)
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // Method to describe the vehicle (to be overridden by child classes)
    public function describe() {
        return "This is a vehicle.";
    }
}

// Derived class: Car
class Car extends Vehicle {
    // Additional property for Car
    private $numberOfDoors;

    // Constructor to initialize Car and inherit from Vehicle
    public function __construct($make, $model, $year, $numberOfDoors) {
        parent::__construct($make, $model, $year);
        $this->numberOfDoors = $numberOfDoors;
    }

    // Override describe method
    public function describe() {
        return "This is a car with $this->numberOfDoors doors.";
    }
}

// Final class: Motorcycle
final class Motorcycle extends Vehicle {
    // Constructor to initialize Motorcycle and inherit from Vehicle
    public function __construct($make, $model, $year) {
        parent::__construct($make, $model, $year);
    }

    // Override describe method
    public function describe() {
        return "This is a motorcycle.";
    }
}

// Interface: ElectricVehicle
interface ElectricVehicle {
    // Method declaration for charging battery
    public function chargeBattery();
}

// Derived class: ElectricCar (extends Car, implements ElectricVehicle)
class ElectricCar extends Car implements ElectricVehicle {
    // Additional property for battery percentage
    private $batteryLevel;

    // Constructor to initialize ElectricCar
    public function __construct($make, $model, $year, $numberOfDoors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $numberOfDoors);
        $this->batteryLevel = $batteryLevel;
    }

    // Implement the chargeBattery method from ElectricVehicle interface
    public function chargeBattery() {
        $this->batteryLevel = 100;
        return "Battery fully charged!";
    }

    // Override describe method
    public function describe() {
        return "This is an electric car with $this->batteryLevel% battery remaining.";
    }
}

// Testing the implementation

// Creating a Car instance
$car = new Car("Toyota", "Corolla", 2020, 4);
echo $car->getDetails() . "\n"; // Outputs the vehicle details
echo $car->describe() . "\n";   // Outputs the car description

// Creating a Motorcycle instance
$motorcycle = new Motorcycle("Harley-Davidson", "Sportster", 2021);
echo $motorcycle->getDetails() . "\n"; // Outputs the motorcycle details
echo $motorcycle->describe() . "\n";   // Outputs the motorcycle description

// Creating an ElectricCar instance
$electricCar = new ElectricCar("Tesla", "Model S", 2022, 4, 80);
echo $electricCar->getDetails() . "\n"; // Outputs the electric car details
echo $electricCar->describe() . "\n";   // Outputs the electric car description
echo $electricCar->chargeBattery() . "\n"; // Charges the battery
echo $electricCar->describe() . "\n";   // Outputs the electric car description after charging
?>