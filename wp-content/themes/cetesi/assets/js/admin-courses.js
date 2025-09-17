/**
 * JavaScript para funcionalidades das páginas de administração de cursos
 * 
 * @package CETESI
 * @version 1.0.0
 */

(function($) {
    'use strict';

    // Aguardar o documento estar pronto
    $(document).ready(function() {
        
        // ========================================
        // FUNCIONALIDADES DA PÁGINA DE GERENCIAMENTO
        // ========================================
        
        // Seleção múltipla de cursos
        let selectedCourses = [];
        let allCoursesSelected = false;
        
        // Botão "Marcar Todos"
        $('#select-all-courses').on('click', function() {
            const checkboxes = $('.course-select');
            const bulkDeleteBtn = $('#bulk-delete');
            
            if (allCoursesSelected) {
                // Desmarcar todos
                checkboxes.prop('checked', false);
                $('.course-list-item').removeClass('checkbox-selected');
                selectedCourses = [];
                allCoursesSelected = false;
                bulkDeleteBtn.prop('disabled', true).hide();
                $(this).find('.btn-label').text('Marcar Todos');
            } else {
                // Marcar todos
                checkboxes.prop('checked', true);
                $('.course-list-item').addClass('checkbox-selected');
                selectedCourses = checkboxes.map(function() {
                    return $(this).val();
                }).get();
                allCoursesSelected = true;
                bulkDeleteBtn.prop('disabled', false).show();
                $(this).find('.btn-label').text('Desmarcar Todos');
            }
        });
        
        // Seleção individual de cursos
        $(document).on('change', '.course-select', function() {
            const courseId = $(this).val();
            const courseItem = $(this).closest('.course-list-item');
            const bulkDeleteBtn = $('#bulk-delete');
            
            if ($(this).is(':checked')) {
                courseItem.addClass('checkbox-selected');
                if (selectedCourses.indexOf(courseId) === -1) {
                    selectedCourses.push(courseId);
                }
            } else {
                courseItem.removeClass('checkbox-selected');
                selectedCourses = selectedCourses.filter(id => id !== courseId);
                allCoursesSelected = false;
                $('#select-all-courses').find('.btn-label').text('Marcar Todos');
            }
            
            // Atualizar botão de exclusão em massa
            if (selectedCourses.length > 0) {
                bulkDeleteBtn.prop('disabled', false).show();
            } else {
                bulkDeleteBtn.prop('disabled', true).hide();
            }
        });
        
        // Exclusão em massa
        $('#bulk-delete').on('click', function() {
            if (selectedCourses.length === 0) {
                alert('Nenhum curso selecionado para exclusão.');
                return;
            }
            
            const confirmMessage = `Tem certeza que deseja excluir ${selectedCourses.length} curso(s) selecionado(s)?`;
            if (!confirm(confirmMessage)) {
                return;
            }
            
            // Criar formulário para exclusão em massa
            const form = $('<form>', {
                method: 'POST',
                action: window.location.href
            });
            
            // Adicionar nonce
            form.append($('<input>', {
                type: 'hidden',
                name: 'bulk_delete_nonce',
                value: cetesiAdmin.bulkDeleteNonce
            }));
            
            // Adicionar IDs dos cursos
            selectedCourses.forEach(function(courseId) {
                form.append($('<input>', {
                    type: 'hidden',
                    name: 'bulk_delete_courses[]',
                    value: courseId
                }));
            });
            
            // Adicionar ação
            form.append($('<input>', {
                type: 'hidden',
                name: 'bulk_delete_action',
                value: 'delete'
            }));
            
            // Enviar formulário
            $('body').append(form);
            form.submit();
        });
        
        // Busca de cursos
        $('#course-search').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            const courseItems = $('.course-list-item');
            
            courseItems.each(function() {
                const courseTitle = $(this).find('.course-title').text().toLowerCase();
                const courseItem = $(this);
                
                if (courseTitle.includes(searchTerm)) {
                    courseItem.show();
                } else {
                    courseItem.hide();
                }
            });
            
            // Atualizar contador de resultados
            const visibleCourses = courseItems.filter(':visible').length;
            const totalCourses = courseItems.length;
            
            if (searchTerm.length > 0) {
                $('.search-results-count').remove();
                $('#course-search').after(`<div class="search-results-count">Mostrando ${visibleCourses} de ${totalCourses} cursos</div>`);
            } else {
                $('.search-results-count').remove();
            }
        });
        
        // ========================================
        // FUNCIONALIDADES DOS FORMULÁRIOS
        // ========================================
        
        // Validação de formulários
        $('.cetesi-course-form').on('submit', function(e) {
            const requiredFields = $(this).find('[required]');
            let hasErrors = false;
            
            requiredFields.each(function() {
                const field = $(this);
                const value = field.val().trim();
                
                if (value === '') {
                    field.addClass('error');
                    hasErrors = true;
                } else {
                    field.removeClass('error');
                }
            });
            
            if (hasErrors) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos obrigatórios.');
                $('.error').first().focus();
            }
        });
        
        // Remover classe de erro ao digitar
        $('.cetesi-course-form input, .cetesi-course-form select, .cetesi-course-form textarea').on('input change', function() {
            $(this).removeClass('error');
        });
        
        // ========================================
        // FUNCIONALIDADES DE UI
        // ========================================
        
        // Animações de hover nos cards
        $('.course-list-item').hover(
            function() {
                $(this).addClass('hover-effect');
            },
            function() {
                $(this).removeClass('hover-effect');
            }
        );
        
        // Confirmação de exclusão individual
        $(document).on('click', '.action-btn.delete', function(e) {
            const courseTitle = $(this).closest('.course-list-item').find('.course-title').text();
            const confirmMessage = `Tem certeza que deseja excluir o curso "${courseTitle}"?`;
            
            if (!confirm(confirmMessage)) {
                e.preventDefault();
            }
        });
        
        // Loading state nos botões
        $('.button-primary').on('click', function() {
            const button = $(this);
            const originalText = button.html();
            
            button.prop('disabled', true);
            button.html('<span class="dashicons dashicons-update"></span> Processando...');
            
            // Reverter após 3 segundos (caso não haja redirecionamento)
            setTimeout(function() {
                button.prop('disabled', false);
                button.html(originalText);
            }, 3000);
        });
        
        // ========================================
        // FUNCIONALIDADES RESPONSIVAS
        // ========================================
        
        // Ajustar layout em telas pequenas
        function adjustLayout() {
            const windowWidth = $(window).width();
            
            if (windowWidth < 768) {
                // Mobile: ajustar ações dos cursos
                $('.course-actions').addClass('mobile-layout');
            } else {
                $('.course-actions').removeClass('mobile-layout');
            }
        }
        
        // Executar no carregamento e redimensionamento
        adjustLayout();
        $(window).on('resize', adjustLayout);
        
        // ========================================
        // FUNCIONALIDADES DE ACESSIBILIDADE
        // ========================================
        
        // Navegação por teclado
        $('.action-btn').on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });
        
        // Foco visível
        $('.action-btn, .course-select').on('focus', function() {
            $(this).addClass('keyboard-focus');
        }).on('blur', function() {
            $(this).removeClass('keyboard-focus');
        });
        
    });

})(jQuery);
