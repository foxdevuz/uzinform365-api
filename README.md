# Documentation to use this code

> First of all, you need to read the documentation carefully, always send header `Accept` `application/json`, to get response. 

> You will be working with api methods and here how to use them.

1 Login
> This method is used for login adminstrators

Api method: `login` <br />
Url: `https://example.com/api/login` <br />
Request method: `post` <br />
Validated fields: `login` and `password` <br />

2 Add News
> This method is used to add news

API method: `addNews` <br />
Url: `https://example.com/api/addNews` <br />
Request method: `post` <br />
Validated fields: `token`,`title`,`category`,`description`,`image` <br />
>> Token will be given when you login the adminstrator, 

3 Update News
> This method is used to update news

API method: `updateNews` <br />
Url: `https://example.com/api/updateNews` <br />
Request method: `post` <br />
Validated fields: `token`,`id`,`title`,`category`,`description`,`image` <br />
>> Token will be given when you login the adminstrator, 

4 Delete News
> This method is used to delete news

API method: `deleteNews` <br />
Url: `https://example.com/api/deleteNews` <br />
Request method: `post` <br />
Validated fields: `token`,`id` <br />
>> Token will be given when you login the adminstrator, 

5 Get News 
> This method is used to get all news

API method: `getNews` <br />
Url: `https://example.com/api/getNews` <br />
Request method: `get` <br />
Validated fields: `You don't have to send anything to pass validation` <br />

6 Get One News 
> This method is used to get one news by it's slug

API method: `unknown` <br />
Url: `https://example.com/api/getNews/{news:slug}` <br />
Request method: `get` <br />
Validated fields: `slug` <br />
>> How to send request? it looks like https://example.com/api/getNews/yangilik-uchun-yasalgan-slug
>this

7 Add Category 
> This method is used to add category

API method: `addCategory` <br />
Url: `https://example.com/api/addCategory` <br />
Request method: `post` <br />
Validated fields: `token`,`name` <br />

8 Get all categories 
> This method is used to get all category

API method: `getAllCategories` <br />
Url: `https://example.com/api/getAllCategories` <br />
Request method: `get` <br />
Validated fields: `you don't have to send anything to validate` <br />


9 Get Category news
> This method is used to get all news which with the same category

API method: `getCategoryNews` <br />
Url: `https://example.com/api/getCategoryNews` <br />
Request method: `get` <br />
Validated fields: `category` <br />


10 Delete category
> This method is used to delete category

API method: `delCategory` <br />
Url: `https://example.com/api/delCategory` <br />
Request method: `post` <br />
Validated fields: `id`,`token` <br />


11 Update category
> This method is used to update category

API method: `updateCategory` <br />
Url: `https://example.com/api/updateCategory` <br />
Request method: `post` <br />
Validated fields: `id`,`token`,`name` <br />
