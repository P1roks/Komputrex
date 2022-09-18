<?php
class singleProduct implements ArrayAccess{
	private int $id;
	private readonly array $product;

	function __construct($id,$servername = 'localhost',$username='komputrex',$password='taniej')
	{
		$this->id =$id;

		$cursor = mysqli_connect($servername,$username,$password,"Komputrex");
		if ($cursor->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		$result = $cursor->query("select * from products where id = " . $id);
		if ($result->num_rows === 1) {
			$this->product = $result->fetch_assoc();
		} else {
		  die("Wystąpił Nieoczekiwany Błąd!");
		}
	}
	public function offsetGet($offset){
		return isset($this->product[$offset]) ? $this->product[$offset] : null;
	}
	public function offsetExists($offset): bool {
		return isset($this->product[$offset]);
	}
	public function offsetUnset($offset): void{
		unset($this->product[$offset]);
	}
	public function offsetSet($offset, $value): void {
		if (is_null($offset)) {
		    $this->product[] = $value;
		} else {
		    $this->product[$offset] = $value;
		}
	}
	public function getSpecsList(int $lenght): array{
		$arr = preg_split("/\r\n|\n|\r/",$this->product['specs']);

		if(count($arr) > $lenght)
		{
			array_splice($arr,$lenght);
			return $arr;
		}
		else
			return $arr;
	}
}
?>
