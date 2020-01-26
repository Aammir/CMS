<!--JS Files-->
<script src="{{url('assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{url('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{url('assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{url('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<!--<script src="{{url('assets/js/light-bootstrap-dashboard.js')}}" type="text/javascript"></script>-->
<script>
var jq = $.noConflict();
function slugify(text) {
  return text.toString().toLowerCase()
    .replace(/([å,ä])/g, 'a')       // Replace å and ä with aa
    .replace(/(ö)/g, 'o')           // Replace ö with o
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/_/g, '-')           // Replace _ with -
    .replace(/,/g, ' ')           // Replace _ with -
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
    .replace(/^-+/, '')             // Trim - from start of text
    .replace(/-+$/, '');            // Trim - from end of text
}
jq(document).ready(function(){
    //making the slug
    jq('#title').keyup(function(){
        var title = jq(this).val();
        var slug = slugify(title);
//        var url = "{{ url('/posts/')}}/"+slug;
        jq('#slug').val(slug);
    });

});
</script>
