<?php
/**
Plugin Name: '.83 Atheist Quotes
Plugin URI: http://since83.com
Description: This plugin puts some great quotes by Atheist on the top of your admin panel
Author: Eric Hamby
Version: 1.3
Author URI: http://erichamby.com
*/

function atheist_quotes_get_lyric() {
  /** The list of quotes */
	$lyrics = "Religion is regarded by the common people as true, by the wise as false, and by the rulers as useful. - Seneca the Younger 4 b.c.- 65 a.d
	You're basically killing each other to see who's got the better imaginary friend. - Richard Jeni
	Men never commit evil so fully and joyfully as when they do it for religious convictions.- Blaise Pascal
	I contend that we are both atheists. I just believe in one fewer god than you do. When you understand why you dismiss all the other possible gods, you will understand why I dismiss yours. - Stephen Roberts
	And if there were a God, I think it very unlikely that He would have such an uneasy vanity as to be offended by those who doubt His existence. - Bertrand Russell
	The fact that a believer is happier than a skeptic is no more to the point than the fact that a drunken man is happier than a sober one. - George Bernard Shaw
	When I was a kid I used to pray every night for a new bicycle. Then I realized that the Lord does not work that way so I stole one and asked Him to forgive me. - Emo Philips
	Is God willing to prevent evil, but not able? Then he is not omnipotent. Is he able, but not willing? Then he is malevolent. Is he both able and willing? Then whence cometh evil? Is he neither able nor willing? Then why call him God? - Epicurus
	You can not convince a believer of anything; for their belief is not based on evidence, it is based on a deep-seated need to believe. - Carl Sagan
	We must question the story logic of having an all-knowing all-powerful God, who creates faulty Humans, and then blames them for his own mistakes. - Gene Roddenberry
	Properly read, the Bible is the most potent force for atheism ever conceived. - Isaac Asimov
	There once was a time when all people believed in God and the church ruled. This time was called the Dark Ages. - Richard Lederer
	Men never commit evil so fully and joyfully as when they do it for religious convictions. - Blaise Pascal
	Do not pray in my school, and I will not think in your church. - Unknown
	Philosophy is questions that may never be answered. Religion is answers that may never be questioned. - Unknown
	Atheism is more than just the knowledge that gods do not exist, and that religion is either a mistake or a fraud. Atheism is an attitude, a frame of mind that looks at the world objectively, fearlessly, always trying to understand all things as a part of nature part of nature. - Carl Sagan 
	Man created God in his image: intolerant, sexist, homophobic and violent. - Marie
	He that will not reason is a bigot; he that cannot reason is a fool; he that dares not reason is a slave. - William Drummond
	George Bush says he speaks to god every day, and christians love him for it. If George Bush said he spoke to god through his hair dryer, they would think he was mad. I fail to see how the addition of a hair dryer makes it any more absurd. - Sam Harris
	Faith: means not wanting to know what is true. - Friedrich Nietzsche
	Deaths in the Bible. God - 2,270,365 not including the victims of Noah`s flood, Sodom and Gomorrah, or the many plagues, famines, fiery serpents, etc because no specific numbers were given. Satan - 10. - Unknown
	The beauty of religious mania is that it has the power to explain everything. Once God (or Satan) is accepted as the first cause of everything which happens in the mortal world, nothing is left to chance...logic can be happily tossed out the window. - Stephen King
	I like your Christ, I do not like your Christians. Your Christians are so unlike your Christ. - Mohandas K Gandhi 
	If people are good only because they fear punishment, and hope for reward, then we are a sorry lot indeed. - Albert Einstein
	God made me an atheist. Who are you to question his wisdom. - Unknown
	The inspiration of the bible depends on the ignorance of the person who reads it. - Robert G. Ingersoll";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}
 
// Create Index Junkie link
function set_since83_atheist_quotes_link($links, $file) {
$plugin = plugin_basename(__FILE__);
	if ($file == $plugin) {
	return array_merge( $links,
	array( sprintf( '<a href="http://since83.com">Since83.Com</a>') ));
	} return $links; }
add_filter( 'plugin_row_meta', 'set_since83_atheist_quotes_link', 10, 2 );

// Create Wp Wisdom link 
function set_wpwisdom_atheist_quotes_link($links, $file) {
$plugin = plugin_basename(__FILE__);
	if ($file == $plugin) {
	return array_merge( $links,
	array( sprintf( '<a href="http://wpwisdom.com">WpWisdom.Com</a>') ));
	} return $links; }
add_filter( 'plugin_row_meta', 'set_wpwisdom_atheist_quotes_link', 10, 2 );

// This just echoes the chosen line, we'll position it later
function atheist_quotes() {
	$chosen = atheist_quotes_get_lyric();
	echo "<table class='widefat'>
<tr class='alternate'>
<td><p>$chosen</p></td>
</tr>
<tr class='alternate'>
			<td><p>
			Do you have a great quote you want to see in the plugin? Feel free to let us know about it. 
			</br></br><span class='button-secondary'><a href='http://since83.com/topic/20-atheist-quotes/' target='_blank'>Plugin Support Page</a></span>
			</p></td>
		</tr>
<tr class='alternate'>
			<td>
			<span class='button-secondary' style='float:left'><a href='http://since83.com' target='_blank'>Since83.Com</a></span> <span class='button-secondary' style='float:left'><a href='http://www.facebook.com/pages/Atheist-Quotes/233616596730454' target='_blank'>FaceBook Page</a></span>
			<span class='button-secondary' style='float:right'><a href='http://erichamby.com' target='_blank'>EricHamby.Com</a></span>
			</td>
		</tr>

</table>";
}

// Now we set that function up to execute when the admin_notices action is called
/*add_action( 'admin_notices', 'atheist_quotes' );*/

// We need some CSS to position the paragraph
function atheist_quotes_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'right' : 'right';
	$y = is_rtl() ? 'left' : 'left';

	echo "
	<style type='text/css'>
	#atheist_quote {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
		text-align: $y;
	}
	</style>
	";
}

add_action( 'admin_head', 'atheist_quotes_css' );



function atheist_quotes_widget() {
	  atheist_quotes(); } 
function atheist_quotes_admin_widget() {
	wp_add_dashboard_widget('atheist_quotes', 'Atheist Quotes', 'atheist_quotes_widget');	
} 
add_action('wp_dashboard_setup', 'atheist_quotes_admin_widget' );
?>
