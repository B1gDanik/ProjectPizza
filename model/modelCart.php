<?php 
class modelCart {

    public static function countItems()
    {
        if(isset($_SESSION['products'])){
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity){
                $count = intval($count) + intval($quantity);
            }
            echo $count;
        } else {
            echo 0;
        }
    }

    //---- add to cart
    public static function getCartAdd($id)
    {
        $productsInCart = array();

        if(isset($_SESSION['products'])){
             $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)){
            $productsInCart[$id] ++;
        } else {
            $productsInCart[$id] = 1;
        }
        $_SESSION['products'] = $productsInCart;
        return;
    }

    //---- prodcuts cart
    public static function getProductsById_s($idsArray)
    {
        $idsString = implode(',', $idsArray);
        $sql = "SELECT * FROM product WHERE id IN ($idsString)";
        $db = new Database();
        $items = $db->getAll($sql);
        return $items;
    }
    //---- total order
    public static function getTotalPrice($products)
    {
        $productsInCart = $_SESSION['products'];
        $total = 0;
        foreach ($products as $item) {
            if (array_key_exists($item['id'], $productsInCart)) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    public static function getCartProductDelete($id)
    {
        $productsInCart = array();
        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] --;
            if ($productsInCart[$id] <= 0) {
                unset($productsInCart[$id]);
            }
        }
        $_SESSION['products'] = $productsInCart;
        return;
    }
	
	public static function getSendOrder(){
		$sendResult=False;
		if(isset($_POST['send'])){
			$clientName=$_POST['clientName'];
			$address=$_POST['aadress'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			
			$productsInCart = $_SESSION['products'];
			$productsArray = array_keys($productsInCart);
			$productList = modelCart::getProductsById_s($productsArray);
			$totalPrice = modelCart::getTotalPrice($productList);
			
			$productListBase='';
			foreach ($_SESSION['products'] as $id=>$quantity){
				$productListBase.=$id.":".$quantity.',';
			}
			 /*INSERT INTO `order_pizza` (`id`, `orderedPizza`, `orderdDate`, `totalPrice`, `clientName`, `aadress`, `phone`, `email`) VALUES (NULL, '2:1', '2021-10-13', '12', 'qw', 'qwert', '123', 'as');*/
		$sql="INSERT INTO `order_pizza` (`id`,`orderedPizza`,`orderdDate`, `totalPrice`,`clientName`,`aadress`,`phone`,
		`email`) VALUES (NULL, '$productListBase', CURDATE(), '$totalPrice', '$clientName', '$address', '$phone', '$email')";
			$db=new Database();
			$item=$db->executeRun($sql);
			if($item){
				$sendResult=True;
			}
		}
		return $sendResult;
	}
}


?>