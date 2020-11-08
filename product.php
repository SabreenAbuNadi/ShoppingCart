<?php

class Product
{

    public $productArray = array(
        "product01" => array(
            'id' => '1',
            'code' => 'product01',
            'name' => 'Item 1',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product1.jpg',
            'price' => '12.99'
        ),
        "product02" => array(
            'id' => '2',
            'code' => 'product02',
            'name' => 'Item 2',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product2.jpg',
            'price' => '14.99'
        ),
        "product03" => array(
            'id' => '3',
            'code' => 'product03',
            'name' => 'Item 3',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product3.jpg',
            'price' => '9.99'
        ),
        "product04" => array(
            'id' => '4',
            'code' => 'product04',
            'name' => 'Item 4',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product4.jpg',
            'price' => '19.99'
        ),
        "product05" => array(
            'id' => '5',
            'code' => 'product05',
            'name' => 'Item 5',
            'description' => 'should be description for this product here',
            'image' => 'product-images/product5.jpg',
            'price' => '19.99'
        ),
        "product06" => array(
            'id' => '6',
            'code' => 'product06',
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
