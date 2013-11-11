<?php
/**
 * Service for checking out wholesale orders ...
 * @author Allanaire Tapion
 * @copyright 2011 - Inform8
 */
class CheckoutService extends BaseLineItemService{
	public function __construct(){
		parent::__construct();
		$this->validators[] = new BillingDetailSetChecker();
		$this->validators[] = new NonEmptyOrderChecker();
	}
	
	protected function runImplementation(){
		//dao's and authManager
		$orderDao = new WholesalerOrderDao();
    	$itemDao = new WholesalerOrderItemDao();
    	$productOptionDao = new ProductOptionDao();
    	$authManager = Session::getInstance()->getAuthenticationManager();
    	
    	//get the instance of the shopping bag
    	$shoppingBag = ShoppingBag::getInstance();
    	$orderItemObjs = array();
    	
    	//creates the order
    	$order = new WholesalerOrder();    	
    	$items = $shoppingBag->getItems();
    	/* @var $address Address */
    	$address = $shoppingBag->getBillingAddress()->getAddressIdAsObject();
    	$order->setWholesalerId($authManager->getUser()->getPk());
    	$order->setBillingName($authManager->getUser()->getName());
    	$order->setBillingAddress($address->getAddress());
	    $order->setBillingAddress2($address->getAddress2());
	    $order->setBillingCity($address->getCity());
	    $order->setBillingState($address->getState());
	    $order->setBillingPostCode($address->getPostCode());
	    $order->setBillingCountry($address->getAddressCountryIdAsObject()->getCountry());
    	
	    $address = $shoppingBag->getDeliveryAddress()->getAddressIdAsObject();
	    $order->setDeliveryAddress($address->getAddress());
	    $order->setDeliveryAddress2($address->getAddress2());
	    $order->setDeliveryCity($address->getCity());
	    $order->setDeliveryState($address->getState());
	    $order->setDeliveryPostCode($address->getPostCode());
	    $order->setDeliveryCountry($address->getAddressCountryIdAsObject()->getCountry());
	   
	    $deliveryOption = $shoppingBag->getDeliveryOption(); 
	    /* @var $deliveryOption DeliveryOption */
	    $order->setDeliveryOption($deliveryOption->getTitle());
	    $order->setDeliveryPrice($deliveryOption->getBasePrice());
	    $order->setWebOrder(1);
	    $order->setState('Ordered');
	    $order = $orderDao->create($order);
	    
    	if (!empty($items)){
    		//save order items
    		foreach($items as $item){
    			/* @var $item LineItem */
    			$orderItem = new WholesalerOrderItem();
			    $orderItem->setWholesalerOrderId($order->getPk());
			    $orderItem->setProductOptionId($item->getProductOption()->getPk());
			    $orderItem->setCode($item->getProductOption()->getProductIdAsObject()->getProductTypeIdAsObject()->getCode() . '-' . $item->getProductOption()->getPk());
			    $orderItem->setName($item->getProductOption()->getProductIdAsObject()->getName());
			    $orderItem->setPrice($item->getProductOption()->getWholesalePrice());
			    $orderItem->setSalePrice($item->getProductOption()->getSaleWholesalePrice());
			    $orderItem->setQuantity($item->getQuantity());
			    $orderItem->setSize($item->getProductOption()->getSizeIdAsObject()->getName());
			    $orderItem->setColour($item->getProductOption()->getColourIdAsObject()->getName());
			    $orderItemObj = $itemDao->create($orderItem);
			    $orderItemObjs[] = $orderItemObj;
    		}
    		
    		// update product quantities
    		foreach($items as $item) {
    			
    			$inStock = intval($item->getProductOption()->getQuantityInStock());
			    $inStock = $inStock - $item->getQuantity();
			    
			    if ($inStock < 0) { 
			        $inStock = 0;
			    }
			      
			   	$item->getProductOption()->setQuantityInStock($inStock);
			    $productOption = $productOptionDao->save($item->getProductOption());
			    
    		}
    		
    		$shoppingBag->clear();
    		
    	}
    	
    	return $this->encoder->json_passed();
	}
}