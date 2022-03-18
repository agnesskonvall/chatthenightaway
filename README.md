![Chat the night away](https://media.giphy.com/media/pirtYVKOEha8M/giphy.gif)

## Chat the night away

Chat the night away is a laravel-built application made to be used like a contained chatroom. 

## Installation

1. Clone this repository and open it in Visual Studio Code.
2. Set up a blank database in TablePlus with the name chatthenightaway.
3. Run "php artisan migrate" in your terminal in order to add the database-template.
4. Add an .env file with the information in the .envexample-file. 
5. Make a pusher account at [Pusher](https://dashboard.pusher.com/accounts/sign_up). You can use your existing GitHub-account.
6. Add your Pusher-credentials to your .env file. 
7. Run "php artisan serve" and "npm run dev".
8. Sign up and get to chatting!

# Code Review

Code review written by Emma Ramstedt & Amanda Hultén.

1. `general` - Remember to upload an installation-guide, especially since you need pusher-up run the application.
2. `ChatsController:24` - You could write: Message::join('users', 'users.id', '=', 'messages.user_id')->get(); instead of select(*).
3. `ChatController:17` - We had a hard time understanding the purpose of this function, since you already have an middleware in your route.
4. `general` - Consider cleaning up your files from blank spaces and template comments to minimize your rows.
5. `general` - It would be helpful with comments in your code, to get a better understanding of every function.
6. `ChatController: 37` - You could add: orderBy('messages.created_at', 'asc') to make the message-flow easier to read.
7. `ChatController: 49` - It is more preferable to use input instead of get.
8. `RegisterController` - On the email requirements, add email and unique to make your application more secure. 
9. `Model - Message: 13` -  We are curious to know more about the decision to add user_id as proteced fillable, let us know your thoughts.
10. `web.php` - We are not quite sure why there is a return inside the route, these two routes look different compared to the other routes, how come?
11. `web.php` - We noticed that there are middleware on some post routes but not on others. 
12. `general-blades` - @endsection is deprecated and has been replaced with @stop.
13. `general-blades` - Consider adding front end validation (such as "required") in your HTML forms for extra validation.
14. `tests` - Don't forget to add some tests 🧪 .
15. `Model - User` - We noticed that you are using the bcrypt() function to hash the password. bcrypt() is only calling for the hash. If you want to, you could type Hash::make($password) instead.
16. `chatroom.blade` - The user is able to pick a colour but it is not used anywhere. You can quickly implement the colour by for example adding the following: <span style="color: {{$message->color}}">{{$message->username}}</span>
17. `layout.blade` - We noticed that you fetch a js script in your layout blade that does not seem to be used. Consider removing the script tag from the blade.
18. `general` - Do not forget to check so that your code follows PSR-12 standards, you can install lint to check this.
19. `general` - Consider including success messages for a better user experience (for example when creating an account: "account was successfully created").
20. `general` - You have given good and easily understandable names for tables and functions. Good job!
