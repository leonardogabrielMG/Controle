@extends("template/web")

@section("titulo", "Cadastro")

@section("formulario")
    <h3>Cadastro de Sipag</h3>
    <form method="POST" action="/sipag" class="row"> 
        @csrf 
        <input type="hidden" name="id" value="{{ $sipag->id }}" />

        <div class="form-grup col-4">
            <label for="nome">Sipag: </label>
            <input type="text" name="nome" class="form-control" value="{{ $sipag->nome }}" />
        </div>

        <div class="form-grup col-4">
            <label for="state">Status: </label>
            <select name="state" class="form-control" value="{{ $sipag->state }}">
                <option></option>
                @if ($sipag->state != "")
                    <option value="Em uso">Em uso</option>
                    <option value="Em manutenção">Em manutenção</option>
                    <option value="{{ $sipag->state }}" selected="selected">{{ $sipag->state }}</option>
                @else
                    <option value="Em uso">Em uso</option>
                    <option value="Em manutenção">Em manutenção</option>
                @endif
            </select> 
        </div>

        <div class="form-grup col-4">
            <label for="pa">PA: </label>
            <select name="pa" class="form-control" value="{{ $sipag->pa }}">
                <option></option>
                @if ($sipag->state != "")
                    <option value="Patrocínio">Patrocínio</option>
                    <option value="Coromandel">Coromandel</option>
                    <option value="{{ $sipag->pa }}" selected="selected">{{ $sipag->pa }}</option>
                @else
                    <option value="Patrocínio">Patrocínio</option>
                    <option value="Coromandel">Coromandel</option>
                @endif
            </select>  
        </div>
        <div class="form-grup col-4">
            <a href="/sipag" class="btn btn-primary bottom">
                <i class="fas fa-plus"></i>
                Novo
            </a>
            <button type="submit" class="btn btn-success bottom">
                <i class="fa fa-save"></i>
                Salvar
            </button>
        </div>
    </form>
@endsection

@section("tabela")
    <h3>Lista de Sipag</h3>
    <div class="">
        <table class="table table-bordered table-hover" id="tabelaS">
            <colgroup>
                <col width="100">
                <col width="100">
                <col width="100">
                <col width="60">
                <col width="60">
            </colgroup>
            <thead>
                <tr>
                    <th>Sipag</th>
                    <th>Status</th>
                    <th>PA</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sipags as $sipag)
                    <tr>
                        <td>{{ $sipag->nome }}</td>
                        <td>{{ $sipag->state }}</td>
                        <td>{{ $sipag->pa }}</td>
                        <td>
                            <a href="/sipag/{{ $sipag->id }}/edit" class="btn btn-warning">
                                <i class="fas fa-edit"></i>
                                Editar
                            </a>
                        </td>
                        <td>
                            <form action="/sipag/{{ $sipag->id }}" method="POST">
                                <input type="hidden" name="_method" value="DELETE" />
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?');">
                                    <i class="fas fa-trash"></i>
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection