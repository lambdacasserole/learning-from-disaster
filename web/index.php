<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/styles.css"/>
    <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <title>Would You Survive?</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="/svg/logo.svg" class="logo">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <p>
                We trained a neural network to give us a probability that you'd survive the Titanic disaster, based on
                age, sex and cabin class.
            </p>
            <form class="form">
                <div class="form-group">
                    <label for="age">
                        Age:
                    </label>
                    <input type="number" class="form-control" id="age" name="age" value="18">
                </div>
                <div class="form-group">
                    <label for="sex">
                        Sex:
                    </label>
                    <select class="form-control" name="sex" id="sex">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cabin_class">
                        Cabin Class:
                    </label>
                    <select class="form-control" name="cabin_class" id="cabin_class">
                        <option value="1">First</option>
                        <option value="2">Second</option>
                        <option value="3">Third</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row results" style="display:none">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="well">
                <p><span class="comment"></span> I calculate a...</p>
                <p class="probability">
                    <span class="percentage"></span>%
                </p>
                <p>
                    Chance that you make it out alive.
                </p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button onclick="go();" class="btn btn-lg btn-success btn-block margin-bottom-plus">Would I Survive?</button>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <hr>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-muted text-center small copyright">
            Would You Survive? | Copyright &copy; Saul Johnson
        </div>
    </div>
</div>
</body>
</html>
