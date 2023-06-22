<div class="input-field">
    <input type="text" name="name" value="{{isset($registro->name) ? $registro->name : ''}}">
    <label>Nome</label>
</div>
<div class="input-field">
    <input type="text" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
    <label>E-Mail</label>
</div>
<div class="input-field">
    <input type="password" name="password" value="{{isset($registro->senha) ? $registro->senha : ''}}">
    <label>Senha</label>
</div>
<div class="input-field">
    <input type="text"  value="">
    <label>Confirmar Senha</label>
</div>