<?php
 // error_reporting(0);
error_reporting(-1);
ini_set('display_errors', 1);
include 'Main_model.php';
class RectangleClass 
{
    /**
     * Class constructor.
     */
    private $table = 'rectangle';
    private $width;
    private $height;
    public function __construct()
    {
        $this->Main_model = new Main_model;
    }
    public function set_data()
    {
        $this->set_width_or_height('width');
        $this->set_width_or_height('height');
    }
    public function set_width_or_height($var_name , $error = 0 )
    {
        echo $error != 0 ? "Error $var_name must be integer, Please re-enter $var_name value:" : "Enter $var_name value:";
        echo "\n"; 
        $number = fgets(STDIN); 
          if ( intval($number) > 0 ) {
             $this->$var_name = intval($number);
        }else{
            return $this->set_width_or_height($var_name  , 1 );
        }
    }
    public function get_average(): float
    {
        return ($this->width + $this->height) / 2;
    }
    public function get_area(): int{
        return $this->width * $this->height;
    }
    public function get_area_square(): int{
        return $this->get_area() * $this->get_area();
    }
    public function save_data()
    {
        $data['width'] = $this->width;
        $data['height'] = $this->height;
        $data['average'] = $this->get_average();
        $data['area'] = $this->get_area();
        $data['square_area'] = $this->get_area_square();
        $data['created_at'] = date('Y-m-d H:i:s');
        if($this->Main_model->addRow($this->table, $data)){
             echo "Data inserted successfully \n"; 
        }else{
             echo "An error, please try again \n";
         }
    }
    public function get_last_elements(int $limit = 5)
    {
        $data = $this->Main_model->GetWhere($this->table,'*',array(),'id','desc',$limit);
        return $data;
    }
    public function show_data_in_terminal($data)
    {
        if ($data) {
            echo "Last inserted items are : \n";
            foreach ($data as $key => $value) {
                echo "ID is : $value->id  , Width is : $value->width , Height is : $value->height , created at : $value->created_at \n";
            }
        } else {
            echo "there is not data added yet\n";
        }
    }
}

?>