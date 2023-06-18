# wp_api
Ще один класс з необхідним набором функцій для роботи з апі Wordpress. 
Чому ще один? Тому що пошук клієнта для роботи з апі привів мене до громіздких рішень на гіт. Це мене не влаштувало і як наслідок з'явився ей легкий клас. 

Як додавти до свого скрипту? <br>
Просто  <code>include('s-client.php'); </code><br>
І потім задайте клас в своему скрипті <code>$wp_client = new wp_api($url, $user, $pass); </code><br>

Приклад даних авторизації:
 <code>
$url  = 'https://site.com/wp-json/wp/v2';
$user = 'admin';
$pass = 'VdGK **** 0f0r fb07 **** QsJE';
</code><br>
Для роботи доступні наступні ендпоінти:
<br><code>
/posts
/posts/%d
/media
/media/%d
/users
/users/%d
/users/me
/categories
/categories/%d
/pages
/pages/%d
/tags
/tags/%d
/comments
/comments/%d
</code>
Стосовно даних, які можна отримати або передати - можете ознайомитись на стайті wp, рубрика api.
<br>
Приклад створення посту:<br>
<code>
$addPost = [
			'date'    => $date_added,
			'modified' => $date_added,
			'link'    => $page_url,
			'slug'    => $page_url,
			'status'  => 'publish',
			'title'   => $name,
			'content' => $content,
			'author'  => $author_id,
			'ping_status'  => 'open',
			'categories' => array($category_id),
			'tags'    => $final_tags
		];

		$post_data = $wp_client->posts('add', $addPost);
</code>
$post_data повертає массив результат виконання, якщо виникла помилка - код помилки, якщо успіх id нового посту та інформацію про нього. <br>
$post_data відповіді не фільтруються а повертаються як є.<br>
Приклад отримання списку категорій, постів, посту по id:<br><br>
<code>$allCategories = $wp_client->categories();</code>
<code>$allPosts = $wp_client->posts();</code>
<code>$post = $wp_client->getPost($id);</code>

*Потім допишу весь список методів, зараз можете його переглянути в класі.
