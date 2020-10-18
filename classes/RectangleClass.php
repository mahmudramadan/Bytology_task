<?php
 // error_reporting(0);
error_reporting(-1);
ini_set('display_errors', 1);
include 'MainModel.php';
class RectangleClass 
{
    /**
     * Class constructor.
     */
    private $table = 'rectangle';
    private $width;
    private $height;
    private $mainModel;
    public function __construct()
    {
        $this->mainModel = new MainModel;
    }
    public function setData()
    {
        $this->setWidthOrHeight('width');
        $this->setWidthOrHeight('height');
    }
    public function setWidthOrHeight($varName , $error = 0 )
    {
        echo $error != 0 ? "Error $varName must be integer, Please re-enter $varName value:" : "Enter $varName value:";
        echo "\n"; 
        $number = fgets(STDIN); 
          if ( intval($number) > 0 ) {
             $this->$varName = intval($number);
        }else{
            return $this->setWidthOrHeight($varName  , 1 );
        }
    }
    public function getAverage(): float
    {
        return ($this->width + $this->height) / 2;
    }
    public function getArea(): int{
        return $this->width * $this->height;
    }
    public function getAreaSquare(): int{
        return $this->getArea() * $this->getArea();
    }
    public function saveData()
    {
        $data['width'] = $this->width;
        $data['height'] = $this->height;
        $data['average'] = $this->getAverage();
        $data['area'] = $this->getArea();
        $data['square_area'] = $this->getAreaSquare();
        $data['created_at'] = date('Y-m-d H:i:s');
        if($this->mainModel->addRow($this->table, $data)){
             echo "Data inserted successfully \n"; 
        }else{
             echo "An error, please try again \n";
         }
    }
    public function getLastElements(int $limit = 5)
    {
        $data = $this->mainModel->getWhere($this->table,'*',array(),'id','desc',$limit);
        return $data;
    }
    public function showDataInTerminal($data)
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