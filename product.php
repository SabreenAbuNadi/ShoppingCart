
<?php

class Product
{

    public $productArray = array(
        "product01" => array(
            'id' => '1',
            'name' => 'Item 1',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product1.jpg',
            'price' => '12.99'
        ),
        "product02" => array(
            'id' => '2',
            'name' => 'Item 2',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product2.jpg',
            'price' => '14.99'
        ),
        "product03" => array(
            'id' => '3',
            'name' => 'Item 3',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product3.jpg',
            'price' => '9.99'
        ),
        "product04" => array(
            'id' => '4',
            'name' => 'Item 4',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product4.jpg',
            'price' => '19.99'
        ),
        "product05" => array(
            'id' => '5',
            'name' => 'Item 5',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product5.jpg',
            'price' => '19.99'
        ),
        "product06" => array(
            'id' => '6',
            'name' => 'Item 6',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product6.jpg',
            'price' => '19.99'
        )
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}
