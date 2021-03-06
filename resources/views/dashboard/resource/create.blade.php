@extends('dashboard.base')

@section('css')

@endsection

@section('content')


<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Agregar nuevo {{ $form->name }}</h4>                    
                    </div>
                    <div class="card-body">                            
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{ route('resource.store', $form->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @foreach($columns as $column)
                                        <?php

                                        $flag = false;
                                        foreach($inputOptions as $option){  //check did $column is input type
                                            if($option['value'] == $column->type){
                                                $flag = true;
                                                break;
                                            }
                                        }
                                        if($flag == true){
                                            if($column->type == 'checkbox'){
                                                echo '<div class="form-check checkbox">';
                                                echo '<input class="form-check-input" type="checkbox" value="true" name="' . $column->column_name . '">';
                                                echo '<label class="form-check-label">' . $column->name  . '</label>';
                                                echo '</div>';
                                            }elseif($column->type == 'radio'){
                                                echo '<label class="mt-3">' . $column->name . '</label>';
                                                echo '<div class="form-check">';
                                                echo '<input class="form-check-input" type="radio" value="true" name="' . $column->column_name . '">';
                                                echo '<label class="form-check-label">yes</label>';
                                                echo '</div>';
                                                echo '<div class="form-check mb-3">';
                                                echo '<input class="form-check-input" type="radio" value="false" name="' . $column->column_name . '">';
                                                echo '<label class="form-check-label">no</label>';
                                                echo '</div>';
                                            }elseif($column->type == 'hidden'){
                                                echo '<input type="hidden" name="' . $column->column_name . '">';
                                            }else{
                                                echo '<div class="form-group">';
                                                echo '<label>' . $column->name . '</label>';
                                                echo '<input type="' . $column->type . '" class="form-control" name="' . $column->column_name . '" value="'. old($column->column_name) .'">';
                                                echo '</div>';                                       
                                            }                                
                                        }elseif($column->type == 'relation_select'){
                                            echo '<div class="form-group">';
                                            echo '<label>' . $column->name . '</label>';
                                            echo '<select name="' . $column->column_name . '" class="form-control">';                                    
                                            foreach($relations['relation_' . $column->column_name] as $relation){
                                                //echo '<option value="' . $relation->id . '">' . $relation->name . '</option>';
                                                if($relation->id == old($column->column_name)){
                                                        echo '<option selected value="' . $relation->id . '">' . $relation->name . '</option>';
                                                    }else{
                                                        echo '<option value="' . $relation->id . '">' . $relation->name . '</option>';
                                                }
                                            }
                                            echo '</select>';
                                            echo '</div>';
                                        }elseif($column->type == 'relation_radio'){
                                            echo '<label class="mt-3">' . $column->name . '</label>';
                                            foreach($relations['relation_' . $column->column_name] as $relation){
                                                echo '<div class="form-check">';
                                                echo '<input class="form-check-input" type="radio" value="' . $relation->id . '" name="' . $column->column_name . '">';
                                                echo '<label class="form-check-label">' . $relation->name . '</label>';
                                                echo '</div>';
                                            }
                                        }elseif($column->type == 'file' || $column->type == 'image'){
                                            echo '<label class="btn btn-primary mt-2 ml-1">';
                                            echo $column->name . ' <input type="file" name="' . $column->column_name . '">';
                                            echo '</label>';
                                        }elseif($column->type == 'text_area'){
                                            echo '<div class="form-group row">';
                                            echo '<label class="col-form-label">' . $column->name . '</label>';
                                            echo '<textarea class="form-control" name="' . $column->column_name . '" rows="9" value="'. old($column->column_name) .'"></textarea>';
                                            echo '</div>';                                
                                        }else{
                                            echo '<p>Not recognize field type: ' . $column->type . '</p>';
                                        }
                                        ?>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary mt-3">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                    <a href="{{ route('resource.index', $form->id) }}" class="btn btn-secondary mt-3">
                                        <i class="fas fa-backward"></i> Volver
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')


@endsection