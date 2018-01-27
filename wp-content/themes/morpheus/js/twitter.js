function format_tweets(tweetdata) {
    var statusHTML = [];
    for (var i = 0; i < tweetdata.length; i++) {
        var username = tweetdata[i].user.screen_name;
        var status = twttr.txt.autoLink(tweetdata[i].text);
        // tidy up
        // remove the @ from outside the link
        status = status.split('@<').join('<');
        // put @ back in link
        var mod = jQuery('<p></p>').html(status);
        mod.find('a').map(function(index,item){
            if (jQuery(item).hasClass('username')){
                jQuery(item).prepend('@');
            }
        });
        // remove classes from links
        mod.find('a').removeAttr('class');
        // build it
        status = mod.html();
        statusHTML.push('<li class="tweet"><span class="text">' + status + '</span><small class="time"><a href="http://twitter.com/' + username + '/statuses/' + tweetdata[i].id_str + '">' + relative_time(tweetdata[i].created_at) + '</a></small></li>');
    }
    return statusHTML.join('');
}

function relative_time(time_value) {
    var values = time_value.split(" ");
    time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
    var parsed_date = Date.parse(time_value);
    var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
    var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
    delta = delta + (relative_to.getTimezoneOffset() * 60);

    if (delta < 60) {
        return 'less than a minute ago';
    } else if (delta < 120) {
        return 'a minute ago';
    } else if (delta < (60 * 60)) {
        return (parseInt(delta / 60)).toString() + ' minutes ago';
    } else if (delta < (120 * 60)) {
        return 'an hour ago';
    } else if (delta < (24 * 60 * 60)) {
        return (parseInt(delta / 3600)).toString() + ' hours ago';
    } else if (delta < (48 * 60 * 60)) {
        return '1 day ago';
    } else {
        return (parseInt(delta / 86400)).toString() + ' days ago';
    }
}