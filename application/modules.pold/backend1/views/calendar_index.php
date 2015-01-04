<script>
  $(function() {
    $( document ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
  });
 </script>
<style type="text/css">
.ui-tooltip, .arrow:after {
    background: black;
    border: 2px solid white;
  }
  .ui-tooltip {
    padding: 10px 20px;
	padding-left:500px;
    color: white;
    border-radius: 20px;
    font: bold 14px "Helvetica Neue", Sans-Serif;
    text-transform: uppercase;
    box-shadow: 0 0 7px black;
  }
  .arrow {
    width: 70px;
    height: 16px;
    overflow: hidden;
    position: absolute;
    left: 50%;
    margin-left: -35px;
    bottom: -16px;
  }
  .arrow.top {
    top: -16px;
    bottom: auto;
  }
  .arrow.left {
    left: 20%;
  }
  .arrow:after {
    content: "";
    position: absolute;
    left: 20px;
    top: -20px;
    width: 25px;
    height: 25px;
    box-shadow: 6px 5px 9px -9px black;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    tranform: rotate(45deg);
  }
  .arrow.top:after {
    bottom: -20px;
    top: auto;
  }
.calendar {
  margin-left: 30px;
  margin-top: 30px;
  margin-bottom: 30px;
	font-family: Arial, Verdana, Sans-serif;
	width: 100%;
	min-width: 960px;
	border-collapse: collapse;
}

.calendar tbody tr:first-child th {
	color: #505050;
	margin: 0 0 10px 0;
}

.day_header {
	font-weight: normal;
	text-align: center;
	color: #757575;
	font-size: 10px;
}

.calendar td {
	width: 14%; /* Force all cells to be about the same width regardless of content */
	border:1px solid #CCC;
	height: 100px;
	vertical-align: top;
	font-size: 10px;
	padding: 0;
}

.calendar td:hover {
	background: #F3F3F3;
}

.day_listing {
	display: block;
	text-align: right;
	font-size: 12px;
	color: #2C2C2C;
	padding: 5px 5px 0 0;
}

div.today {
	background: #E9EFF7;
	height: 100%;
}
</style>
<h2>Administration</h2>
<?php
echo $cal;
?>