# Amaweb

This is the source code for my personal website called "Amaweb" cheekily.

This website is most definitely inspired by the early internet era. A web unpolished but with a personality. Although I can not claim to compete with the personality of the early web but I can definitely compete with being unpolished!

## Documentation

### Models

This website is comprised of the following ORM models and relationships:

* Blog
* Comment
* User

A Blog can have many comments and a comment belongs to a blog.

A blog can belong to a user as well. This feature is made just for an attempt at future proofing even though there are no plans for other users to be able to create blogs.

*However users with admin status can theoratically create blogs in the system.*

### Controllers

These are the following Controllers:

* **BlogController**: Managing blogs as well as search actions
* **CommentController**: Creating and managing comments.
* **SessionController**: This is for creating unique sessions for users
* **UserController**: This controller is for modifying registered users in database.

### Views

The pages of this site were made mostly in blade + tailwind and some light Javascript. Javascript is mostly used to create modal windows on occasions and a scrollable div.

### Authentication Middleware

This site only uses simple gates to control authentications and policies.

There are only three gates defined:

* edit-comment
* edit-blog
* create-blog
