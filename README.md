# How to fix CSRF regenerate ajax issue in codeigniter
First we get config/config.php then find line for setting CSRF.
$config['csrf_regenerate'] = true;
we should csrf regenerate to true. after we get view file for setting ajax code like below. 

![csrf_html](https://user-images.githubusercontent.com/33055689/52579755-00abd280-2e51-11e9-8fb5-c535f031efc2.PNG)


here we taking csrf token name and csrf hash value by variable $token_name & $token_hash after set with hidden input element. now we get jquery post method like below

![csrf_jquery](https://user-images.githubusercontent.com/33055689/52580066-c42ca680-2e51-11e9-94cd-e92c26270d2f.PNG)

Now please set your controller like below code
![csrf_controller](https://user-images.githubusercontent.com/33055689/52580285-3dc49480-2e52-11e9-903e-365b207ce0fe.PNG)

after you get final result like that
![search_sagetion](https://user-images.githubusercontent.com/33055689/52580350-5a60cc80-2e52-11e9-84dd-d9238d21ad76.PNG)
