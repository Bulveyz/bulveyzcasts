@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{asset('libs/aos.css')}}">
@endsection
@section('main')
    <div class="container text-center">
       
       <section data-aos="zoom-in">
           <h1 class="mb-3">Совершентствуй свой IT</h1>
           <p class="mb-5 gray-black-color">Изучай фрэимворки, языки, задавай вопросы и обсуждай различные IT темы. <br>
               Поможем друг другу стать настоящими IT гуру! Стартуем?</p>
           <img class="img-fluid mb-5" src="images/Group.svg" alt="img">
           <div>
               <a class="main-link-button" href="/">Начать!</a>
           </div>
       </section>
        
        <section data-aos="fade-up-right" data-aos-delay="200">
            <h2>Множнство бесплатных видеоуроков</h2>
            <p class="gray-black-color">Без воды и лишней, ненужной информации, все быстро и просто</p>
            <img class="img-fluid mb-5" src="images/player.svg" alt="img">
            <p class="gray-black-color">
                Лучше много коротких уроков, чем один большой. Ведь так намного проще запоминать новую ифнормацию. Я советую после каждого видеоурока повторять действия из видео, для того чтобы лучше запомнить материал и сразу применить его на практике
            </p>
            <div>
                <a class="main-link-button" href="/">Перейти</a>
            </div>
        </section>
    
        <section data-aos="fade-up-left" data-aos-delay="200">
            <h2>Переводы лучших курсов и видео уроков</h2>
            <p class="gray-black-color mb-5">Многие начинающие сталкиваются с языковым барьером в изучении IT, ведь только на английском можно найти самые новейшие и уникальные решения, поэтому я решил перевести для тебя самые популярые видеоуроки!</p>
            <img class="img-fluid mb-5" src="images/flags.svg" alt="img">
            <div>
                <a class="main-link-button" href="/">Перейти</a>
            </div>
        </section>
    
        <section data-aos="fade-up" data-aos-delay="200">
            <h2 class="mb-5">Полезнве стаьи которые помогут ответить на ваши вопросы</h2>
            <img class="img-fluid mb-5" src="images/files.svg" alt="img">
            <p class="gray-black-color mb-5">Регулярно я опубликовываю новые и очень полезные посты, в которых каждый может найти для себя что-то новое и нужное, так-же я перевожу и собираю со всего простора интернета самые топовые артиклы, чтобы вся нужная информация была у тебя всегда под рукой</p>
            <div>
                <a class="main-link-button" href="/">Перейти</a>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{asset('libs/aos.js')}}"></script>
    <script type="text/javascript">
        AOS.init();
    </script>
@endsection
