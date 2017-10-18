# Contributing to GitHost

:+1::tada: First off, thanks for taking the time to contribute! :tada::+1:

## Styleguides

### Git Commit Messages

* Use the present tense ("Add feature" not "Added feature")
* Use the imperative mood ("Move cursor to..." not "Moves cursor to...")
* Limit the first line to 72 characters or less
* Reference issues and pull requests liberally
* When only changing documentation, include `[ci skip]` in the commit description
* Consider starting the commit message with an applicable emoji:
    * :art: `:art:` when improving the format/structure of the code
    * :cake: `:cake:` when edit templates or/and css styles
    * :rocket: `:rocket:` when improving performance
    * :memo: `:memo:` when writing docs
    * :bug: `:bug:` when fixing a bug
    * :fire: `:fire:` when removing code or files
    * :green_heart: `:green_heart:` when fixing the CI build
    * :white_check_mark: `:white_check_mark:` when adding tests
    * :lock: `:lock:` when dealing with security
    * :arrow_up: `:arrow_up:` when upgrading dependencies
    * :arrow_down: `:arrow_down:` when downgrading dependencies
    * :dolphin: `:dolphin:` when add new migrations
    * :shirt: `:shirt:` when removing linter warnings
    * :watermelon: `:watermelon:` when you add or edit translations.
    * :gem: `:gem:` when you creating new release
    * :bookmark: `:bookmark:` when creating new tag
    * :ambulance: `:ambulance:` when you adding critical hotfix

# Environments and branches

* Staging - master branch
* Development - branches created from issues
* Release - tags

## Branches and tags

* `master` default and protected branch
* `github-dev` branch which is ommited to and from github (protected)

# Commit Acceptance

* Commits must be made to branches which is created from issue docummented in tracker
* Must be as small as possible (do not edit what you dont need)
* If you find bug or something blocked your work create new issue.

## Flow

### New features 

1.  New fetures and bug fixes must be docummented in issue tracker, from here will be created new branch `x-my-feature` (where x is issue ID) checked out from `master` branch
2.  After work is done create Merge request back to `master`
3.  New features will be added into `stable` branche before release
4.  From stable branche will be created new tag and release

### Bugs and hotfixes

1. Found bug must be docummented in issue tracker, from here will be created new branch checked out from master
2. After work is done create Merge request back to master
3. After succesfull test will be merged back to master
4. Merge request will be cherry picked into stable branche and if test will be completed then new release will be created

## GitHub

1. All commitment must be docummented in issue tracker, from this will be created new branch checked out from `gh-master` branch
2. After work is done create Merge request back to `gh-master`
3. This branch will be synchronized back to our server once a day and runs tests if this are ok it will be merged to `master` branch

## Branches/tags naming

* Branches must have name `<x>-my-awesome-featur` where `x` is issue id. Issue must exist.
    * `stable` branches are protected an must have name `<XXXX>-<xx>-stable`
* Tags has name `vXXXX.xx.pp` where `XXXX` is mayor version for example 2017, `xx` is minor version for example 21 and `pp` is patch number.

Tags can be created by masters only.