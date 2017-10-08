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
* Release - tags

## Branches and tags

* `master` default and protected branch
* features - branches created from issue must checkout and push to/from `master`
* `*stable*` branches - protected branches, for example 2017-9-stable for each version of v2017.9.x, checked out from `master`
* tags - defining release version, they are made from stable branches

## Flow

1.  New fetures and bug fixes must be docummented in issue tracker, from here will be created new branch `x-my-feature` (where x is issue ID) checked out from `master` branch
2.  After work is done create Merge request back to master
3.  New features will be added into `stable` branche before release
4.  From stable branche will be created new tag and release

## Branches/tags naming

* Branches must have name `<x>-my-awesome-featur` where `x` is issue id. Issue must exist.
    * `stable` branches are protected an must have name `<XXXX>-<xx>-stable`
* Tags has name `vXXXX.xx.pp` where `XXXX` is mayor version for example 2017, `xx` is minor version for example 21 and `pp` is patch number.

Tags can be created by masters only.