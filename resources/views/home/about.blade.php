@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
	<div class="row">


		<div>
			<p class="lead">+ Turband nedir?</p>
			<p>- Turband kullanıcıların tanım ekleyebildiği veya varolan tanımları oylayabildiği interaktif bir Türkçe halk sözlüğüdür.</p>
		</div>

		<div>
			<p class="lead">+ Turband ismi nerden gelmektedir?</p>
			<p>- Turband ismi 'Turkish Urban Dictionary' kelimelerinin bir sentezidir.</p>
		</div>

		<div>
			<p class="lead">+ Turband neden oluşturuldu?</p>
			<p>- Temel motivasyon urbandictionary.com' websitesinin Türkçe için olan bir versiyonuna gerek görülmesidir.</p>
		</div>


		<div>
			<p class="lead">+ Nasıl üye olurum?</p>
			<p>- 'Kayıt' sekmesinden bir nickname belirleyip e-posta ve şifre aracılığıyla üye olunabilir.</p>
		</div>

		<div>
			<p class="lead">+ Tanım ekleme önşart(lar)ı nedir?</p>
			<p>- Kayıtlı kullanıcı olmak, e-posta adresini doğrulamış olmak.</p>
		</div>

		<div>
			<p class="lead">+ Tanım oylama önşart(lar)ı nedir?</p>
			<p>- Kayıtlı kullanıcı olmak.</p>
		</div>

		<div>
			<p class="lead">+ Tanımlar nasıl listelenir?</p>
			<p>- Üst metin çubuğunda herhangi bir kelime/kelime grubu girilip 'ara' butonuna basıldıktan sonra ilgili tanımlar listelenebilir. Eğer tam olarak yazılmış olan kelime/kelime grubuna ait tanımlar listelenmek isteniyorsa 'tam eşleştir' seçeneği seçilmelidir.</p>
		</div>

		<div>
			<p class="lead">+ Tanımlar listelenirken neye göre sıralanır?</p>
			<p>- Kelimeler önce alfabeye göre sıralanır, aynı olan kelimeler ise kendi arasında önce kullanıcı oyları daha sonra oluşturulma tarihi dikkate alınarak önceliklendirilir.</p>
		</div>

		<div>
			<p class="lead">+ Tanım eklerken kriterler nedir?</p>
			<p>- Kelime ve tanımın en az iki karakter uzunluğunda olması, opsiyonel olarak bir örnek kullanım girilmesi.</p>
		</div>

		<div>
			<p class="lead">+ Tanımlar listelenirken neye göre sıralanır?</p>
			<p>- Kelimeler önce alfabeye göre sıralanır, aynı olan kelimeler ise kendi arasında önce kullanıcı oyları daha sonra oluşturulma tarihi dikkate alınarak önceliklendirilir.</p>
		</div>

		<div>
			<p class="lead">+ Turband kim(ler) tarafından geliştirildi?</p>
			<p>- Mustafa Can Akpınar (<a href="https://github.com/mcridah">Github</a>) tarafında geliştirildi.
			</p>
		</div>
		
		<div>
			<p class="lead">+ Geliştirici ile nasıl irtibat kurarım?</p>
			<p>- '<a href="mailto:admin@turband.xyz">admin@turband.xyz</a>' adresine mail atarak ya da geliştiricinin Github profilinde kayıtlı e-mail aracılığıyla iletişime geçilebilir.</p>
		</div>




	</div>
</div>
@endsection