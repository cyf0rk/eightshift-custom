# WordPress Task template

Thank you for taking the time to complete this task.

The task itself is pretty simple - create the landing page provided in the design. The design is located in the `assets` folder.

The implementation of the task is what we'd like to see how you do. We are using object oriented PHP in our day to day work, so we hope you're familiar with it.

## What you need to do

First, read this entire document before starting your work on the task. You'll get a better grasp of it that way.

For every part of the task please do the following:
1. Create a new branch from `main`
2. Once you’re done with the feature, you should create a pull request towards your `main` branch and assign our engineers ([Denis](https://github.com/dingo-d/) and [Gabriel](https://github.com/gabriel-glo)) to review your pull request. They might leave some questions here and there, inquiring how you did a certain feature. You may even create a pull request early on, mark it as work in progress and assign reviewers. That way we can be quicker in reviewing your code changes.
3. Once your feature is approved, merge it to `main`

Note: You should probably invite our engineers to your repository, so that you can assign them to the PR and they can leave questions and comments for you.

### 🚀 Prerequisites

You should have a local development setup ready. You can check out our [handbook](https://infinum.com/handbook/books/wordpress) for some of the development environments we are using in our day to day lives. If you're on MacOS, the easiest to set up is probably Laravel Valet. On Windows, we recommend using [WSL2](https://docs.microsoft.com/en-us/windows/wsl/install) or one of VM solutions like: [VVV](https://varyingvagrantvagrants.org/) or [Laravel Homestead](https://laravel.com/docs/homestead). 

#### Note 
Due to the way VM solutions are working, you'll need to run all relevant commands inside the virtual environment. They include installation, setup and build scripts.

You should have [Node.js](https://nodejs.org/en/), [Composer](https://getcomposer.org/), and [WP-CLI](https://wp-cli.org/) installed in order to fully explore the power of the [Eightshift development kit](https://infinum.github.io/eightshift-docs/).

## 🎓 First task

Setup the theme using Eightshift development kit. We are using it to create interesting web solutions for our clients. We would like to see how you navigate through it.

Be sure to follow the [instructions](https://infinum.github.io/eightshift-docs/docs/theme/) when creating the theme.

Disable the core WordPress blocks, so that only the Eightshift ones are left.

Do this in a separate branch, create a PR and assign the reviewers to check it out.

#### Note

Make sure not to commit WordPress core files. Adding those makes it impossible to review your code.

## 🎓 Second task

Once you're finished with setting the basic theme up, in a separate branch, create a way to fetch some data from a public API. You can choose any of the free public APIs from this list:

https://github.com/public-apis/public-apis

You should retrieve the data with some PHP magic. After that, create a custom REST route that will display the fetched news.

Once you've done that, create a PR and assign the reviewers to check it out.

##### 🎉 Tips and tricks

Our development kit has tons of useful [WP-CLI methods](https://infinum.github.io/eightshift-docs/docs/basics/wp-cli) that you can use to do various things, like creating classes or REST endpoints. If you're wondering more about how to connect everything up in PHP, check out our [backend](https://infinum.github.io/eightshift-docs/docs/basics/backend) documentation. You should get some good insights about our architecture.

## 🎓 Third task

Because we are using [Gutenberg](https://github.com/WordPress/gutenberg/) blocks to build our frontend and the editor, we'd like you to create a custom block that will load the news fetched from the second task. The news should be rendered as a grid of four items in a row (Latest corns in the design).

Once you've done that, create a PR and assign the reviewers to check it out.

##### 🎉 Tips and tricks

Some blocks are a bit different than the others. The one you should create is also a bit different. Hint: [Server side rendering](https://infinum.github.io/eightshift-docs/docs/legacy/v5/basics/blocks-intro/#do-i-need-to-write-js-and-php-implementation-for-all-my-blocks).

## 🎓 Final task

Style the rest of the frontpage. The rest of the design can be acchieved using blocks provided by our libs. Just change the styling. We'd like to see your (S)CSS skills as well.

Once you've done that create a PR and assign the reviewers to check it out.

## Final tips

* Commit early, commit often.
* Write good commit messages.
* **Read documentation before you start**.
* Ask if you are stuck, don't waste an entire day.
* Documenting your code is important and helpful.
* Reuse what you can.
* Lint all your code.
* Write mobile first CSS

Good luck 🙂

