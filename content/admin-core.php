<form action="createProject.php" class="admin-create" enctype='multipart/form-data' method="post">
  <div class="admin-create__desc">заголовок (в index)</div>
  <input class="admin-create__input" type="text" name="title">
  <div class="admin-create__desc">какая задача проекта?</div>
  <input class="admin-create__input" type="text" name="task">
  <div class="admin-create__desc">технологии применяемые в проекта (разделитель ,)</div>
  <input class="admin-create__input" type="text" name="technology">
  <div class="admin-create__desc">цена</div>
  <input class="admin-create__input" type="text" name="price">
  <div class="admin-create__desc">url</div>
  <input class="admin-create__input" type="text" name="href">
  <div class="admin-create__desc">описание проекта (в header__desk) зоголовок</div>
  
  <input class="admin-create__input" type="text" name="description">
  <div class="admin-create__desc">короткое описание (в index)</div>
  <textarea class="admin-create__text"name="shortdesc" id="" ></textarea>
  <div class="admin-create__desc">текст разработки проекта</div>
  <textarea class="admin-create__text" name="devtext" id="" ></textarea>
  <div class="admin-create__desc">количсво изоброжений на слайдере (если 0 то нет слайдера)</div>
  <input class="admin-create__input" type="text" name="slider">
  <div class="admin-create__desc">если есть slider or sliders то загрузить</div>
  <input type="file" name="images[]" id="images" multiple="multiple" >
  <div class="admin-create__desc">вложение(json)</div>
  <textarea class="admin-create__text"name="attachment" id="" ></textarea>
  <div class="admin-create__desc">потрачено времени(json)</div>
  <textarea class="admin-create__text"name="wasted-time" id="" ></textarea>
  <div class="admin-create__desc">мое мнение о проекте</div>
  <textarea class="admin-create__text"name="opinion" id=""></textarea>
  <div class="admin-create__desc">описание провок если есть</div>
  <textarea class="admin-create__text"name="revisions" id="" ></textarea>
  <input class="admin-create__input" type="submit" name="issubmit">
</form>