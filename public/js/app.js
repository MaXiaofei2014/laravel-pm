

$("#time_type").select({
  title: "周期",
  items: ["今天", "周", "月"],
  onChange: function(d) {

    console.log(this, d);
  },
  onClose: function() {
    console.log("close");
    var time_type = $('#time_type').val();

    window.location.href='/pm/calendar?time_type='+time_type;

// $.ajax({
// url: "/pm/calendar/time",

// data:{time_type:time_type},

// type: "get",

// dataType:'json',

// success:function(){

// }

// });

  },
  onOpen: function() {
    console.log("open");
  },
});
