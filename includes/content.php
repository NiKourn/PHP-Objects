<?php
$css_line = "<div style='width:100%;border-bottom:1px solid black;height:3px;margin:15px 0'></div>";


//Using property promotion as of PHP 8.0
//Maybe train a bit using the standard __construct method. OK
echo 'Start Program: ' . memory_get_usage() . '<br>';


echo "<body><div style=''>
	<div class='container p-2' style='width:1100px;margin:0 auto;'>";
		
		echo '<h3>Includes Order</h3>';
		echo '1.Interfaces (Can\'t instantiate, implements classes and can combine with traits) <br>';
		echo '2.Traits (Used inside classes, basically methods that `included` in a class use with use)<br>';
		echo '3.Abstracts (Can\'t instantiate, uses extend like parents but abstract methods must be the exact same as type and names as methods in child theme)<br>';
		echo '4.Classes <br><br>';
		
		
		echo 'Memory usage after scripts loaded: ' . memory_get_usage() . '<br>';
		
		// Check loaded included files
		
		?>
		
		
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Check loaded files
		</button>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Included files</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<?php
						echo "<div class=''>";
						$count = 0;
						foreach ( get_included_files() as $included_file ) {
							echo $count . '. ' . $included_file . '<br>';
							$count ++;
						}
						echo "</div>";
						
						?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Understood</button>
					</div>
				</div>
			</div>
		</div>
		
		
		<?php
		
		?>
	</div>
</div>