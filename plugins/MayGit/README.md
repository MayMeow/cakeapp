# May Git

Small Git abstraction layout

#installation

//todo

#Using

## Creating Repository

* Create Bare Repository

```php
$repository = new GitRepository('may/hello-world.git');
$repository->initBare();
```

* Check if repository is empty

```php
$repository = new GitRepository('may/hello-world.git');
$repository->isEmpty(); // true or false
```

This command will create new repository in `GIT_DATA / may / hello-world.git` folder.

* Getting files in repository

```php
$repository = new GitRepository('may/hello-world.git');
// Get Tree from HEAD
$repository->getTree();
// Get Master branch files
$repository->getTree('master');
// or as path to folder
$repository->getTree('master/_data');
```

* Getting Commits

```php
$repository = new GitRepository('may/hello-world.git');
$gitlog = $gitRepo->getLog(); // returns array of Commit objects

// to list messages from commits and user you can use:

foreach($gitLog->getCommits() as $commit) {
    var_dump($commit->getAuthor()->toString()); // returns Author Name<author@email.tld>
    var_dump($commit->getMessage()->__toString()); // First line from message
}
```