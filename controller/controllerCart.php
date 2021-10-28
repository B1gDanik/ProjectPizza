<?php 
class controllerCart{
    public static function cartActionAdd($id)
    {
        modelCart::getCartAdd($id);
        $categories = Model::getCategoryList();

        $product = Model::getProductById($id);
        include_once ('view/productDetail.php');
    }

    public static function cartList()
    {
        if(isset($_SESSION['products'])){
            $productsInCart = $_SESSION['products'];

            $productArray = array_keys($productsInCart);
            $productList = modelCart::getProductsById_s($productArray);
            $totalSum = modelCart::getTotalPrice($productList);
        }
        include_once 'view/cartList.php';
    }
    public static function cartProductDelete($id)
    {
        if (isset($_SESSION['products'])) {
            modelCart::getCartProductDelete($id);
            $productsInCart = $_SESSION['products'];
            $productArray = array_keys($productsInCart);
            $productList = modelCart::getProductsById_s($productArray);
            $totalSum = modelCart::getTotalPrice($productList);
        }
        include_once('view/cartList.php');
    }
    public static function cartProductAdd($id)
    {
        if (isset($_SESSION['products'])) {
            modelCart::getCartAdd($id);
            $productsInCart = $_SESSION['products'];
            $productArray = array_keys($productsInCart);
            $productList = modelCart::getProductsById_s($productArray);
            $totalSum = modelCart::getTotalPrice($productList);
        }
        include_once('view/cartList.php');
    }

	
    //--- cartClear
    public static function cartClear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
        include_once('view/cartList.php');
    }
	
	//--- order form
	public static function orderSend() {
		$sendResult=False;
		if (isset($_SESSION['products'])){
		$sendResult= modelCart::getSendOrder();
		if($sendResult){
			unset($_SESSION['products']);
		}
	}
	include_once ('view/orderResult.php');
}
}

?>