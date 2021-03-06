﻿<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    $_SESSION["curr_page"] = basename(__DIR__);
    ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/header.php'; ?>



    <title>Home | Game Development Studio</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/nav.php'; ?>


<div class="page-content"></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="../lib/jquery.slimscroll.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.7/jquery.fullPage.min.js"></script>
<script type="text/template" id="underscore">
    <% _.each(data.sections, function(section) { %>
    <div class="section <% section.autoHeight? print('fp-auto-height'): print('') %>"
         style="<% section.background? print('background-image: url(\'' + section.background + '\');'): print('') %>">
        <% if (section.slides.titlePage) { %>
        <div class="slide">
            <div class="title">
                <%- section.slides.titlePage.title %>
                <% if (section.slides.titlePage.subTitle) { %>
                <div class="sub-title"><%- section.slides.titlePage.subTitle %></div>
                <% }
                if (section.slides.titlePage.btn) { %>
                <a class="btn" target="_blank"
                   href="<% section.slides.titlePage.btn.href? print(section.slides.titlePage.btn.href): print('javascript:;') %>">
                    <%- section.slides.titlePage.btn.title %>
                </a>
                <% } %>
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
                <div class="slide-item-desc"><%- section.slides.video.desc %></div>
            </div>
        </div>
        <% }
        if (section.slides.custom) { %>
        <div class="slide">
            <div class="slide-inner">
                <div class="slide-item-container"><%- section.slides.custom.content %></div>
                <div class="slide-item-desc"><%- section.slides.custom.desc %></div>
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
                    background: "/img/about_1.jpg",
                    slides: {
                        titlePage: {
                            title: "About Us",
                            subTitle: "The Game Development Studio (GDS) is an UCSD student organization dedicated to helping students gain experience in game design through collaborative projects. "
                            // todo: add these things to contact us We are dedicated to working with a number of different platforms such as iPhones/Androids, PC's, and others. GDS is open to students from all different majors and backgrounds to join the club"
                        }
                    }
                }, {
                    background: "/img/about_2.jpg",
                    slides: {
                        titlePage: {
                            title: "What We Are Doing",
                            subTitle: "We are dedicated to working with a number of different platforms such as iPhones/Androids, PC's, and others. We are open to students from all different majors and backgrounds to join the club."
                        },
                        video: {
                            src: "https://www.youtube.com/embed/py8wdeRLMgg",
                            desc: ""
                        }
                    }
                }, {
                    background: "/img/about_3.jpg",
                    slides: {
                        titlePage: {
                            title: "What We Do",
                            subTitle: "Besides programming, the club also has numerous events outside of the project including beach trips, potlucks, job fair networking, and much more!"
                        }
                    }
                }, {
                    background: "/img/about_4.jpg",
                    slides: {
                        titlePage: {
                            title: "What We Have Done",
                            subTitle: "Last year GDS created a cross platform game named Unfold that bridges the gap between desktop and mobile. Using Unity, Blender, and Gimp, we created a competitive yet engaging mobile game that allows for the optional addition of computer browser displays. ",
                            btn: {
                                title: "Learn more",
                                href: "/games/unfold.html"
                            }
                        }
                    }
                }, {
                    background: "/img/about_5.jpg",
                    slides: {
                        titlePage: {
                            title: "History",
                            subTitle: "The Game Development Studio started off in Fall 2013 when a group of UCSD computer science major students decided to get together to work on a project in the interest of advancing their programming skills and gain experience working as a team. Originally christened Squid Inc., the group (not yet officially a student organization) worked on a computerized version of the popular board game Settlers of Catan. Squid Inc. soon began to attract the attention of other students outside of the computer science majors and over the year students from a variety of majors began to join. Using tools such as GitHub, GIMP, and Eclipse the team developed a computerized board game called Enceladus (2014). Seeing the growing interest in the undergraduate community and going into its second year, Squid Inc. took the next logical step and has now officially been incorporated into a UCSD Pre-professional Student Organization. Now with the university and our new video game development faculty advisor's support GDS is eager to begin working on its next project going into 2014.",
                            btn: {
                                title: "Learn more",
                                href: "games/unfold.html"
                            }
                        }
                    }
                }
            ]
        };

        $(".page-content").html(template(data));

        $('.page-content').fullpage({
            scrollOverflow: true
        });
    });
</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/footer.php'; ?>
</body>
</html>