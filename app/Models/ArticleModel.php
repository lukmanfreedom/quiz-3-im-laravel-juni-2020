<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArticleModel {
    public static function get_all() {
        $articles = DB::table('articles')->get();

        return $articles;
    }

    public static function find_by_id($id) {
        $article = DB::table('articles')->where('id', $id)->first();

        return $article;
    }

    public static function save($data) {
        unset($data['_token']);
        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $save = DB::table('articles')->insert($data);

        return $save;
    }

    public static function update($id, $data) {
        $update = DB::table('articles')
            ->where('id', $id)
            ->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'slug' => strtolower(str_replace(' ', '-', $data['title'])),
                'tags' => $data['tags'],
                'created_by' => $data['created_by'],
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return $update;
    }

    public static function delete($id) {
        $delete = DB::table('articles')->delete($id);

        return $delete;
    }
}
