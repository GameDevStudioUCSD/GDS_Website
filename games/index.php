﻿<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>
    <title>Games | Game Development Studio</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/nav.php'; ?>

<div class="page-content"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.7/jquery.fullPage.min.js"></script>
<script type="text/template" id="underscore">
    <% _.each(data.sections, function(section) { %>
    <div class="section <% section.autoHeight? print('fp-auto-height'): print('') %>"
         style="<% section.background? print('background-image: url(\'' + section.background + '\');'): print('') %>">
        <% if (section.slides.titlePage) { %>
        <div class="slide">
            <div class="title">
                <%= section.slides.titlePage.title %>
                <% if (section.slides.titlePage.subTitle) { %>
                <div class="sub-title"><%= section.slides.titlePage.subTitle %></div>
                <% }
                if (section.slides.titlePage.btn) {
                if (section.slides.titlePage.btn.custom) { %>
                <div><%= section.slides.titlePage.btn.title %></div>
                <% } else { %>
                <a class="btn" target="_blank"
                   href="<% section.slides.titlePage.btn.href? print(section.slides.titlePage.btn.href): print('javascript:;') %>">
                    <%= section.slides.titlePage.btn.title %>
                </a>
                <% }
                } %>
            </div>
        </div>
        <% }
        if (section.slides.video) { %>
        <div class="slide">
            <div class="slide-inner">
                <div class="slide-item-container">
                    <iframe width="100%" height="100%" src="<%= section.slides.video.src %>" frameborder="0"
                            allowfullscreen></iframe>
                </div>
                <div class="slide-item-desc"><%= section.slides.video.desc %></div>
            </div>
        </div>
        <% }
        if (section.slides.custom) { %>
        <div class="slide">
            <div class="slide-inner">
                <div class="slide-item-container"><%= section.slides.custom.content %></div>
                <div class="slide-item-desc"><%= section.slides.custom.desc %></div>
            </div>
        </div>

        <% }
        if (section.slides.contents) {
        _.each(section.slides.contents, function(content) { %>
        <div class="slide">
            <div class="slide-inner">
                <div class="slide-item-container"><span></span><img src="<%= content.image %>"/></div>
                <div class="slide-item-desc"><%- content.desc %></div>
            </div>
        </div>
        <% }); %>
        <% } %>
    </div>
    <% }); %>
</script>
<script>
    $(document).ready(function () {
        // Read the content from template
        _.templateSettings.variable = "data";
        var template = _.template($("#underscore").html());
        var data = {
            sections: [
                {
                    background: "../img/unfold_logo.png",
                    slides: {
                        titlePage: {
                            title: "Unfold",
                            subTitle: "The video game we developed last year",
                            btn: {
                                title: 'Learn more',
                                href: "unfold.html"
                            }
                        }
                    }
                }, {
                    background: "../img/dreric_1.jpg",
                    slides: {
                        titlePage: {
                            title: "Dr. Eric Psychedelic Wonderland",
                            subTitle: "The video game we are building this year",
                            btn: {
                                title: "Fork on GitHub",
                                href: "https://github.com/GameDevStudioUCSD/DrEric"
                            }
                        },
                        contents: [{
                            image: "img/dreric_2.jpg",
                            desc: "The cute logo"
                        }, {
                            image: "img/dreric_3.jpg",
                            desc: "Basic demo of this game"
                        }]
                    }
                }
            ]
        };

        $(".page-content").html(template(data));

        $('.page-content').fullpage({});
    });
</script>
<script type="text/javascript" src="../js/main.js"></script>

</body>
</html>