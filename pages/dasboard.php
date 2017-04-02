                    <h1 class="page-header">Web Percobaan</h1>

            	<p>
            		Web ini digunakan untuk melakukan percobaan terhadap serangan serangan
            	</p>
            	                        	<?php

								$time = microtime();
								$time = explode(' ', $time);
								$time = $time[1] + $time[0];
								$finish = $time;
								$total_time = round(($finish - $start), 4);
								echo 'Page generated in '.$total_time.' seconds.';

                        	?>