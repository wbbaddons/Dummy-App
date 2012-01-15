{include file='documentHeader'}

<head>
	<title>{lang}app.header.menu.index{/lang} - {PAGE_TITLE|language}</title>
	
	{include file='headInclude' sandbox=false}

	<style type="text/css">
		.infobox > div img {
			width: 24px;
			height: 24px;
			float: left;
		}

		.infobox .infoboxContent {
			margin-left: 30px;
			min-height: 24px;
			padding-bottom: 5px;
		}
	</style>
</head>

<body id="tpl{$templateName|ucfirst}">
{include file='header' sandbox=false}

<header class="mainHeading">
	<img src="{icon size='L'}home1{/icon}" alt="" />
	<hgroup>
		<h1>{PAGE_TITLE|language}</h1>
		{hascontent}<h2>{content}{PAGE_DESCRIPTION|language}{/content}</h2>{/hascontent}
	</hgroup>
</header>

<div class="border infobox" style="padding: 5px;">
	<div class="infoboxContentContainer">
		<img src="{icon size=M}users1{/icon}" alt="" />
		<div class="infoboxContent">
			<h3>Zur Zeit {if $usersOnline !== NULL && $usersOnline|count == 1}ist{else}sind{/if} {if $usersOnline !== NULL}{$usersOnline|count} Benutzer online:{else}keine Benutzer online{/if}</h3>
			<p>
			{section name=user loop=$usersOnline}
				<a href="{link controller='User' id=$usersOnline[$user]['userID']}{/link}"><span>{$usersOnline[$user]['username']}</span></a>{if $user + 1 != $usersOnline|count},{/if}
			{/section}
			</p>
		</div>
	</div>
	<div class="infoboxContentContainer">
		<img src="{icon size=M}server1{/icon}" alt="" />
		<div class="infoboxContent">
			<h3>Statistik:</h3>
			<p>{$userCount} Mitglieder</p>
			<p>Unser neuestes Mitglied heißt: <a href="{link controller='User' id=$newestUser['userID']}{/link}" title="{$newestUser['username']}">{$newestUser['username']}</a></p>
		</div>
	</div>
	<div class="infoboxContentContainer">
		<img src="{icon size=M}chat1{/icon}" alt="" />
		<div class="infoboxContent">
			<h3>Zur Zeit sind X Benutzer im Chat:</h3>
			<p><span>X</span>,<span>Y</span>,<span>Z</span>,<span>Umlaut-Promi</span></p>
		</div>
	</div>
</div>

{include file='footer' sandbox=false}

</body>
</html>
