<div id="products-page-content" class="row">
  <div><ul>
<!-- Здесь будет контент -->
  </ul></div>
</div>


<div class="pagination pagination-centered pagination-fixed-bottom">
  <ul>
    <li class="disabled"><a href="#">«</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a onclick="renderPage(2); return false;" href="#">2</a></li>
    <li><a onclick="renderPage(3); return false;" href="#">3</a></li>
    <li><a onclick="renderPage(4); return false;" href="#">4</a></li>
    <li><a onclick="renderPage(5); return false;" href="#">5</a></li>
    <li><a href="#" onclick="">»</a></li>
  </ul>
</div>


<script>
$(document).ready(function(){
    
    renderPage(1, function(){            
        $("#products-page-content .product-item .fullinfo a").on('click', function(){
            var item_art = $(this).attr('href');
            renderFullInfo(item_art);
        });
    });
 
});
</script>