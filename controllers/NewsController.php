<?php

include_once ROOT . '/models/News.php';

class NewsController
{
    // список новостей
	public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getNewsList();

        require_once (ROOT . '/views/news/index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = News::getNewsItemId($id);
//
//            echo '<pre>';
//            print_r($newsItem);
//            echo '</pre>';
            require_once (ROOT . '/views/news/view.php');
        }

        return true;
    }
		
}

?>