$(document).ready(function() {
  Parse.initialize("binvtxM0Bj7NRtEmNhvjcFaSXiANCS6qwRXAa4cj", "I5TulhBD2TbytfsOcYGpFdQHZtkKdCXuT5Naja7A");

  var Member = Parse.Object.extend('Member');
  var query = new Parse.Query(Member).descending('sortRank');

  query.find({
    success: function(members) {
      var $team = $('.our_team');
      for (var i = 0; i < members.length; i++) {
        if (!members[i].get('graduated')) {
          $team.append(createMemberDiv(members[i]));
        }
      }
    },
    error: function(error) {
      console.log("Parse failed :(");
    }
  });

  function placeholderImg() {
    return 'img/team/members/' + (1 + Math.floor(Math.random() * 4)).toString() + '.png';
  }

  function createMemberDiv(member) {
    var name = member.get('name');
    var title = member.get('title');
    var image = member.get('image');
    var imageUrl = image ? image._url : placeholderImg();
    var major = member.get('major') || '';
    var year = member.get('year') || '';
    var description = member.get('description');

    var $memberDiv = $('<div>', {class: "member"});
    var $img = $('<img>', {alt: name, src: imageUrl, height: 200, width: 200});
    var $teamInfo = $('<div>', {class: "team_info"})
      .append($('<h2>').text(name))
      .append($('<h4>').text(title || 'Board Member'))
      .append($('<p>', {class: "major_year"}).text((major + ' | ' + year).toUpperCase()))
      .append($('<p>').text(description));

    $memberDiv.append($img).append($teamInfo);
    return $memberDiv;
  }

});
