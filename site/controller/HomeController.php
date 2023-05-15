<?php 
class HomeController {
    function index() {
        $productRepository = new ProductRepository();
        $conds = [];
        $sorts = ['featured' => 'DESC'];
        $featuredProducts = $productRepository->getBy($conds, $sorts, 1, 4);

        $sorts = ['created_date' => 'DESC'];
        $latestProducts = $productRepository->getBy($conds, $sorts, 1, 4);

        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->getAll();
        //Chứa sản phẩm theo danh mục
        $categoryProducts = [];
        foreach ($categories as $category) {
            $conds = [
                "category_id" => [
                    "type" => "=",
                    "val" => $category->getId()
                ]

            ];
            //SELECT * FROM product WHERE category_id = 4
            $products = $productRepository->getBy($conds, $sorts, 1, 4);
            $categoryProducts[$category->getName()] = $products;
        }
 
        require 'view/home/index.php';
    }
}
?>