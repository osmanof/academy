[ClassController::class, 'index'];

Route::get('/', [ClassController::class, 'homepage'])->name("home");
Route::get('/classes', [ClassController::class, 'classes'])->name("classes");

Route::get('/login', [ClassController::class, 'tlogin'])->middleware("guest")->name("login");

Route::get('/teacher/register', [ClassController::class, 'tcreate'])->middleware("guest");
Route::post('/teacher/register', [ClassController::class, 'tstore']) -> name("tregister");

Route::get('/student/register', [RegisterController::class, 'screate']) ->middleware("guest");
Route::post('/student/register', [RegisterController::class, 'sstore']) -> name("sregister");

Route::post('/login', [RegisterController::class, 'login']) -> name("login");

Route::post('/', [RegisterController::class, 'createClass']) -> name("cclass");
