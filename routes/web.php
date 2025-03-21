<?php

use App\Http\Controllers\ControllerController;
use App\Http\Controllers\Director\FrequencyController;
use App\Http\Controllers\Director\NotificationController;
use App\Http\Controllers\Director\SnackController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Responsible\DashboardController;
use App\Http\Controllers\Responsible\StudentsController;
use App\Http\Controllers\Student\ResponsibleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\PerfilController;
use App\Http\Middleware\RedirectByProfile;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Director\DashboardController as DirectorDashboardController;
use App\Http\Controllers\Director\StudentsController as DirectorStudentsController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FaceEventController;
use App\Http\Controllers\FacialImageController;
use App\Http\Controllers\LeadInputController;
use App\Http\Controllers\Responsible\ProfileController as ResponsibleProfileController;
use App\Http\Controllers\Student\CalendarController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DocumentController as StudentDocumentController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/cotacao', function () {
    return view('cotacao2');
}); 

Route::get('/checkout', function () {
    return view('checkout');
}); 

Route::get('/cotacao2', function () {
    return view('cotacao');
}); 
Route::get('/obrigado', function () {
    return view('obrigado');
}); 

Route::get('/painel01', function () {
    return view('dashboard001');
}); 

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Rotas Admin
Route::middleware(['auth', RedirectByProfile::class])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/', function () {
        return view('welcome');
    });


  




    // Listar Perfis
    Route::get('/perfis', [PerfilController::class, 'index'])->name('admin.perfis.index');
    Route::get('/perfis/create', [PerfilController::class, 'create'])->name('admin.perfis.create');
    Route::post('/perfis', [PerfilController::class, 'store'])->name('admin.perfis.store');
    Route::get('/perfis/{perfil}/edit', [PerfilController::class, 'edit'])->name('admin.perfis.edit');
    Route::put('/perfis/{perfil}', [PerfilController::class, 'update'])->name('admin.perfis.update');
    Route::delete('/perfis/{perfil}', [PerfilController::class, 'destroy'])->name('admin.perfis.destroy');

    Route::get('/organizacoes/detalhes/{id}', [OrganizationController::class, 'show'])->name('admin.organizacoes.show');
    Route::get('/organizacoes', [OrganizationController::class, 'index'])->name('admin.organizacoes.index');
    Route::get('/organizacoes/create', [OrganizationController::class, 'create'])->name('admin.organizacoes.create');
    Route::post('/organizacoes', [OrganizationController::class, 'store'])->name('admin.organizacoes.store');
    Route::get('/organizacoes/{organizacao}/edit', [OrganizationController::class, 'edit'])->name('admin.organizacoes.edit');
    Route::put('/organizacoes/{organizacao}', [OrganizationController::class, 'update'])->name('admin.organizacoes.update');
    Route::delete('/organizacoes/{organizacao}', [OrganizationController::class, 'destroy'])->name('admin.organizacoes.destroy');

    Route::get('users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create/{organization_id}', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users/create/{organization_id}', [UserController::class, 'storeAdm'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('users/{user}/addResponsible', [UserController::class, 'addResponsible'])->name('admin.users.addResponsible');
    Route::post('users/{user}/addStudent', [UserController::class, 'addStudent'])->name('admin.users.addStudent');
    Route::post('/user/update-facial-image/{userId}', [UserController::class, 'updateFacialImage'])->name('user.updateFacialImage');

    Route::post('/documents/{id_type}/{user}', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/download/{id}', [DocumentController::class, 'download'])->name('documents.download');

    Route::post('/aprove/{id_user}', [FacialImageController::class, 'approveFacial'])->name('facial.aprove');
    Route::post('/reprove/{id_user}', [FacialImageController::class, 'reprove'])->name('facial.reprove');

});

Route::middleware(['auth', RedirectByProfile::class])->prefix('aluno')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::post('/perfil/update-facial-image', [StudentProfileController::class, 'updateImage'])->name('student.updateImage');
    Route::get('/perfil/detalhes', [StudentProfileController::class, 'index'])->name('student.profile.index');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('student.calendar.index');
    Route::get('/cursos', [CourseController::class, 'index'])->name('student.courses.index');
    Route::get('/documentos', [StudentDocumentController::class, 'index'])->name('student.document.index');
    Route::get('/responsaveis', [ResponsibleController::class, 'index'])->name('student.responsible.index');
    Route::post('/responsavel/criar', [ResponsibleController::class, 'store'])->name('student.responsible.store');
    Route::put('/responsavel/{id}', [ResponsibleController::class, 'update'])->name('student.responsible.update');
    Route::post('/documents/{id_type}/{user}', [StudentDocumentController::class, 'store'])->name('student.documents.store');
    Route::get('/documents/download/{id}', [StudentDocumentController::class, 'download'])->name('student.documents.download');
});

Route::middleware(['auth', RedirectByProfile::class])->prefix('responsavel')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('responsible.dashboard');

    Route::post('/perfil/update-facial-image', [ResponsibleProfileController::class, 'updateImage'])->name('responsible.updateImage');

    Route::get('/perfil/detalhes', [ResponsibleProfileController::class, 'index'])->name('responsible.profile.index');

    Route::get('/alunos', [StudentsController::class, 'index'])->name('responsible.students.index');
    Route::post('/aluno/criar', [StudentsController::class, 'store'])->name('responsible.students.store');
    Route::put('/responsavel/{id}', [StudentsController::class, 'update'])->name('responsible.students.update');

    
});

Route::middleware(['auth', RedirectByProfile::class])->prefix('diretor')->group(function () {

    Route::get('/vendedores', [UserController::class, 'index'])->name('director.vendedores');
    Route::get('/clientes', [UserController::class, 'index'])->name('director.clientes');
    Route::get('/afiliados', [UserController::class, 'index'])->name('director.afiliados');
    Route::get('/leads', [UserController::class, 'index'])->name('director.leads');
    Route::get('/apolices', [UserController::class, 'index'])->name('director.apolices');
    Route::get('/usuarios', [UserController::class, 'index'])->name('director.usuarios');
    Route::get('/relatorios', [UserController::class, 'index'])->name('director.relatorios');
    Route::get('/integracoes', [UserController::class, 'index'])->name('director.integracoes');
    Route::get('/minha-conta', [UserController::class, 'index'])->name('director.minha-conta');


    Route::get('users/{user}', [UserController::class, 'show'])->name('diretor.users.show');
    Route::get('users', [UserController::class, 'index'])->name('diretor.users.index');
    Route::get('users/create/{organization_id}', [UserController::class, 'create'])->name('diretor.users.create');
    Route::post('users/create/', [UserController::class, 'store'])->name('diretor.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('diretor.users.edit');
    Route::post('users/{user}/update', [UserController::class, 'update'])->name('director.user.update.post');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('diretor.users.destroy');
    Route::post('users/{user}/addResponsible', [UserController::class, 'addResponsible'])->name('diretor.users.addResponsible');
    Route::post('users/{user}/addStudent', [UserController::class, 'addStudent'])->name('diretor.users.addStudent');
    Route::post('/user/update-facial-image/{userId}', [UserController::class, 'updateFacialImage'])->name('user.updateFacialImage');



    Route::get('/dashboard', [DirectorDashboardController::class, 'index'])->name('director.dashboard');
    Route::get('/vendas', [DirectorDashboardController::class, 'getVendas'])->name('director.vendas');



    Route::post('/perfil/update-facial-image', [ResponsibleProfileController::class, 'updateImage'])->name('director.updateImage');

    Route::get('/perfil/detalhes', [ResponsibleProfileController::class, 'index'])->name('director.profile.index');

    Route::get('/pre-cadastro', [DirectorStudentsController::class, 'getPreRegister'])->name('director.pre-register.get');
    Route::post('/pre-cadastro', [DirectorStudentsController::class, 'postPreRegister'])->name('director.pre-register.post');
    Route::put('/pre-cadastro/excluir/{id}', [DirectorStudentsController::class, 'deletePreRegister'])->name('director.pre-register.delete');
    Route::post('/upload-cpf', [DirectorStudentsController::class, 'uploadCpf'])->name('upload.cpf');

    Route::get('/merenda/dashboard', [SnackController::class, 'getDashboard'])->name('director.snack.dashboard.get');

    Route::get('/frequencia/dashboard', [FrequencyController::class, 'getDashboard'])->name('director.frequency.dashboard.get');
    
    
    Route::get('/notificacoes/criar', [NotificationController::class, 'create'])->name('director.notifications.create.get');
    Route::get('/notificacoes/dashboard', [NotificationController::class, 'getDashboard'])->name('director.notifications.dashboard.get');

    Route::get('/notificacoes/criar', [NotificationController::class, 'create'])->name('director.notifications.create.get');



    Route::get('/alunos', [DirectorStudentsController::class, 'index'])->name('director.students.index');
    Route::get('/aluno/criar', [DirectorStudentsController::class, 'create'])->name('director.students.create');
    Route::post('/aluno/criar', [DirectorStudentsController::class, 'store'])->name('director.students.store');
    Route::put('/aluno/{id}', [DirectorStudentsController::class, 'update'])->name('director.students.update');

    
});


Route::middleware(['auth', RedirectByProfile::class])->prefix('vendedor')->group(function () {

});

Route::middleware(['auth', RedirectByProfile::class])->prefix('afiliado')->group(function () {

});

Route::middleware(['auth', RedirectByProfile::class])->prefix('cliente')->group(function () {

});


Route::get('/controllers', [ControllerController::class, 'index'])->name('controllers.index');
Route::get('/controllers/create', [ControllerController::class, 'create'])->name('controllers.create');
Route::post('/controllers', [ControllerController::class, 'store'])->name('controllers.store');
Route::get('/controllers/{controller}/edit', [ControllerController::class, 'edit'])->name('controllers.edit');
Route::put('/controllers/{controller}', [ControllerController::class, 'updateController'])->name('controllers.update');
Route::delete('/controllers/{controllers}', [ControllerController::class, 'destroyController'])->name('controllers.destroy');

Route::get('/groups', [GroupController::class, 'index'])->name('groups');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
Route::post('/groups/{group}', [GroupController::class, 'updates'])->name('groups.update');
Route::delete('/groups/{group}', [GroupController::class, 'destroys'])->name('groups.destroy');

Route::get('/student/login', [CustomLoginController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/login', [CustomLoginController::class, 'login'])->name('student.login');
Route::get('/student/register/{student}', [CustomLoginController::class, 'showRegisterForm'])->name('student.register.get');
Route::post('/student/register', [CustomLoginController::class, 'register'])->name('pre-register-student.register');

require __DIR__.'/auth.php';
Route::post('/webhook/face-event', action: [FaceEventController::class, 'handleWebhook']);
Route::post('/lead-create', [LeadInputController::class, 'store']);
