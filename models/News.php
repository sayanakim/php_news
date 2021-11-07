<?php

class News
{
    // получение списка новостей
    public static function getNewsList()
    {
        // запрос к БД
        $db = Db:: getConnection();

        $newList = [];

        $result = $db->query('SELECT id, title, date, short_content 
                            FROM publications ORDER BY date DESC LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['title'] = $row['title'];
            $newList[$i]['date'] = $row['date'];
            $newList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newList;
    }


    // получение одной  новости
    public static function getNewsItemId($id)
    {
        $id = intval($id);

        if ($id) {
            // запрос к БД
            $db = Db:: getConnection();

            $result = $db->query('SELECT * FROM publications WHERE id=' . $id);

    //        $result->setFetchMode(PDO::FETCH_NUM); // или ключ - id
            $result->setFetchMode(PDO::FETCH_ASSOC); // или ключ - название

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }
}