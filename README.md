After reviewing the code, here are some bad practices and improvements:

Violation of Single Responsibility Principle: NewsManager class is responsible for managing news, connecting to the database, and handling comments. It's better to separate these responsibilities.

Lack of encapsulation: The constructor directly requires utility classes and News class. It's better to use dependency injection.

Mixed responsibility of CommentManager: CommentManager should only handle comments, not listing them in NewsManager.

Lack of input validation: addNews() does not validate the input, making it vulnerable to SQL injection.

Mixed use of object-oriented and procedural code: The code mixes object-oriented programming (OOP) and procedural programming, making it harder to maintain and understand.

Lack of namespaces and Composer: Not using namespaces and Composer makes it harder to manage dependencies and autoloading.
